# config valid for current version and patch releases of Capistrano
lock "~> 3.11.0"

set :application, "NumerikGames"
set :repo_url, "git@github.com:CPNV-ES/NumerikGames.git"

set :deploy_to, '/var/www/numerikgames/deploy'

components_dir = '/var/www/numerikgames/components'
set :components_dir, components_dir
# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name

# Devops commands
namespace :ops do

  desc 'Copy non-git files to servers.'
  task :put_components do
    on roles(:app), in: :sequence, wait: 1 do
      system("tar -zcf build/vendor.tar.gz vendor ")
      upload! 'build/vendor.tar.gz', "#{components_dir}", :recursive => true
      execute "cd #{components_dir}
      tar -zxf /var/www/numerikgames/components/vendor.tar.gz"
    end
  end

end
