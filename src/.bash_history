ls
cd webtrack/
ls -la
rm composer.lock 
ls
ls -la
exit
composer require laravel/horizon
php artisan horizon:install
ls
cd webtrack/
ls
ls
cd ..
ls
rm -rf vendor/
ls
rm composer.json composer.lock 
cd webtrack/
php artisan horizon:install
ls
composer require laravel/horizon
php artisan horizon:install
php artisan queue:failed-table
php artisan migrate
exit
