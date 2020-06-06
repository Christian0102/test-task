# Laravel Test-Task
 Laravel Test-Task for 4Pixel Company


## Installation

git clone https://github.com/Christian0102/test-task.git </br>
composer update</br>
composer dump-autoload</br>

configure .env file
 
Make migration:</br>
php artisan migrate

Make symlink() for storage/app/logo folder</br>

php artisan storage:images

php artisan db:seed --class=UsersTableSeeder </br>
php artisan db:seed --class=DepartamentsSeeder </br>


## Usage
login:admin@test.loc
password:password
