set :stage, :dev

# Définit un serveur pour le déploiement préprod
# Vous pouvez en définir plusieurs si vous souhaitez
# déployer sur plusieurs serveurs en meme temps
server '172.17.101.219', user: 'cpnv', roles: %w{web app laravel composer}
