### create new module and migrate db
# php artisan make: migration create_user_otp_table
# php artisan migrate
# php artisan make: controller Auth/AuthOtpController
# php artisan make: model UserOtp

### clear cache and run service laravel
# php artisan optimize
# php artisan config:clear
# php artisan serve

### route : 
http://127.0.0.1:8000/otp/login
http://127.0.0.1:8000/otp/verificationuser_id?1