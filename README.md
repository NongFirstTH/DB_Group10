## Manual 

# Install
./vendor/bin/sail npm i

# Run
./vendor/bin/sail npm run dev

# Migrate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan migrate:rollback

# Seed
./vendor/bin/sail artisan db:seed --class=DatabaseSeeder

# Link to Storage (Edit Profile Picture)
php artisan storage:link