# laravel-evoting-system
Laravel eVoting system

Created admin user using the command below :

php artisan tinker

\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@evoting.com',
    'password' => bcrypt('admin123'),
    'role' => 'admin',
    'has_voted' => false
]);