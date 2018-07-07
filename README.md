# wc_tasks

to install

clone repository
`git clone https://github.com/iosh/wc_tasks.git`

go to the project folder
`cd wc_task`

run composer install
`wc_tasks$ composer install`

copy .env.example
`wc_tasks$ cp .env.example .env`

modify database by editing `.env`
`wc_tasks$ nano .env

generate key
`wc_tasks$ php artisan key:generate`

run migration
`wc_tasks$ php artisan migrate`

seed database
`wc_tasks$ php artisan db:seed`
`
 Do you wish to refresh migration before seeding, it will clear all old data ? (yes/no) [no]:
 > yes

Rolling back: 2018_07_03_130339_create_tasks_table
Rolled back:  2018_07_03_130339_create_tasks_table
Rolling back: 2018_07_03_130152_create_permission_tables
Rolled back:  2018_07_03_130152_create_permission_tables
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table
Migrating: 2018_07_03_130152_create_permission_tables
Migrated:  2018_07_03_130152_create_permission_tables
Migrating: 2018_07_03_130339_create_tasks_table
Migrated:  2018_07_03_130339_create_tasks_table
Data cleared, starting from blank database.
Default Permissions added.

 Create Roles for user, default is admin and user? [y|N] (yes/no) [yes]:
 > yes

 Enter roles in comma separate format. [Admin,User]:
 > Admin,User

Admin granted all the permissions
Here is your admin details to login:
sawayn.verner@example.net
Password is "secret"
Roles Admin,User added successfully
Some Tasks data seeded.
All done :)`

run laravel project
`php artisan serve`


