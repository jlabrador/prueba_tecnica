php bin/console doctrine:generate:entities AppBundle
php bin/console doctrine:schema:update --force
php bin/console assets:install
#php bin/console assetic:dump
sudo rm -fr var/cache/*
sudo chmod 777 -R var/cache
sudo chmod 777 -R var/logs
