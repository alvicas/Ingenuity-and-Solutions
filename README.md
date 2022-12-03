## technical information
"php": "^8.0.2",
"laravel/framework": "^9.19",
DB: Mysql 
## Local deploy Laravel

You must have an apache and mysql management system installed such as xampp.

You must have the php "composer" dependency manager installed.

Create a Mysql database to connect to the project so that the project migrations can be executed.

You must clone the repo inside the folder specified by your management system, in the case of xampp it would be htdoc.

once the project is cloned you must create the .env environment variable file and then manage the information from your local database, for example

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library-app
DB_USERNAME=root
DB_PASSWORD=

Then you must Install the php dependencies by running the "composer install" command

If there was no problem with the previous steps then you can run the command "php artisan migrate"
to create the structure in the database.

After executing the migrations correctly, you can execute the "php artisa serve" command to launch the project and go to the url of your local environment to be able to test the application.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
