# config valid for current version and patch releases of Capistrano
# lock "~> 3.11.0"

set :application, "NumerikGames"
set :repo_url, "git@github.com:CPNV-ES/NumerikGames.git"

set :deploy_to, '/var/www/numerikgames/deploy'

set :ssh_options, {
  :forward_agent => false
}

# Default branch is :master
#set :branch, "develop@v2"
# Default deploy_to directory is /var/www/laravel-capistrano

set :laravel_dotenv_file, '/var/www/secret/.env'
# Default value for keep_releases is 5
set :keep_releases, 5

append :linked_dirs,
   'storage/app/public/pictures/themes'

namespace :composer do
   desc "Running Composer Install"
   task :install do
       on roles(:app) do
           within release_path do
               execute :composer, "install"
               execute :composer, "dump-autoload"
           end
       end
   end
end

namespace :laravel do
   task :fix_permission do
       on roles(:laravel) do
           execute :chmod, "-R ug+rwx #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
           execute :chmod, "-R 777 #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
           #execute :chgrp, "-R www-data #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
       end
   end
   task :configure_dot_env do
   dotenv_file = fetch(:laravel_dotenv_file)
       on roles (:laravel) do
       execute :cp, "#{dotenv_file} #{release_path}/.env"
       end
   end
   task :key do
       on roles(:all) do
           within release_path do
                execute "php", "artisan", "key:generate"
           end
       end
   end
   task :mix do
       on roles(:all) do
           within release_path do
               execute "npm", "install"
                execute "npm", "run", "prod"
           end
       end
   end
   task :database do
       on roles(:all) do
           within release_path do
                execute "php", "artisan", "migrate:fresh --seed"
           end
       end
   end
   task :link do
       on roles(:all) do
           within release_path do
                execute "php", "artisan", "storage:link"
           end
       end
   end
end
namespace :deploy do
   after :updated, "composer:install"
   after :updated, "laravel:fix_permission"
   after :updated, "laravel:configure_dot_env"
   after :updated, "laravel:key"
   after :updated, "laravel:database"
   after :updated, "laravel:link"
end
