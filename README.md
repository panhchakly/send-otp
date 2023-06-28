# create new module and migrate db
php artisan make: migration create_user_otp_table <br />
php artisan migrate <br />
php artisan make: controller Auth/AuthOtpController <br />
php artisan make: model UserOtp

# clear cache and run service laravel 
php artisan optimize <br />
php artisan config:clear <br />
php artisan serve 

# route : 
http://127.0.0.1:8000/otp/login <br />
http://127.0.0.1:8000/otp/verificationuser_id?1
