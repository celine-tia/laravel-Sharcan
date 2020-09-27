# E-coco, tu coco ?

## Install Project
To install and launch this beautifull e-commerce project, you have to:  
Run this composer command: 
```bash 
composer install
```  
Then run these php commands : 

```bash 
php artisan migrate
``` 

```bash 
php artisan storage:link
``` 
```bash 
php artisan db:seed
``` 

With the last command, an admin account should have been created:  
Email: admin@gmail.com  
Password: azerty123

## Launch Project
You can finally launch "E-coco, tu coco ?" with this last command :
 
```bash 
php artisan serve
``` 
