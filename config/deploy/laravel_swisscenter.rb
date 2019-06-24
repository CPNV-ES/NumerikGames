set :application, fetch(:swisscenter_servername)

set :deploy_to, "/home/#{fetch(:swisscenter_username)}/#{fetch(:application)}"

set :use_sudo, false
set :laravel_set_acl_paths, false
set :laravel_upload_dotenv_file_on_deploy, false
set :composer_install_flags, '--no-dev --prefer-dist --no-interaction --optimize-autoloader'

SSHKit.config.command_map[:composer] = "php -d allow_url_fopen=true #{shared_path.join('composer')}"

server fetch(:swisscenter_servername), user: fetch(:swisscenter_username), roles: %w{app db web}, ssh_options: {
  keys: ["./config/#{fetch(:swisscenter_username)}_rsa"],
  forward_agent: false,
  auth_methods: %w(publickey)
}

before 'composer:run', 'set_php_version'
after  'composer:run', 'copy_dotenv'
after  'composer:run', 'laravel:migrate'

# Determine the PHP version chosen in the swisscenter control panel
task :set_php_version do
  on roles(:all) do
    execute "ls /home/#{fetch(:swisscenter_username)}/.data/#{fetch(:swisscenter_servername)}_php* 2>/dev/null | sed -E 's/.+(php[[:digit:]]+)$/\\1/' >/tmp/.php-cli-version"
  end
end

# Copy .env in the current release
task :copy_dotenv do
  on roles(:all) do
    execute :cp, "#{shared_path}/.env #{release_path}/.env"
  end
end

# Until the `capistrano/laravel` gem is updated, manually remove the `laravel:optimize` task which exists no more from Laravel >=5.5
Rake::Task['laravel:optimize'].clear_actions rescue nil
