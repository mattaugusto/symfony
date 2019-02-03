# symfony

composer install\
composer require symfony/web-server-bundle --dev\
php bin/console doctrine:schema:create\
php bin/console make:migration\
php bin/console doctrine:migrations:migrate\
php bin/console server:run

yarn install\
sass global.scss global.css --style compressed\
yarn encore dev