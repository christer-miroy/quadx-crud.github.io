# quadx-crud
*** Open two Visual Studio windows. One for front-end connection, one for back-end connection ***

=== Back-end Laravel Connection === NOTE: Start your XAMPP or Laragon Server

--- Connect to Laravel Server (Visual Studio Terminal): --- *** make sure you are inside quadx-laravel folder *** quadx\quadx-laravel> php artisan serve

=== ENV file for MySQL Connection ===
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3308
DB_DATABASE=quadx-laravel
DB_USERNAME=root
DB_PASSWORD=

--- Connect to VueJS 3 Server (Visual Studio Terminal) --- *** make sure you are inside quadx-vuejs folder *** quadx\quadx-vuejs> npm run serve
To run vuejs: 
http://localhost:8080/
