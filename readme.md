<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About JOB PORTAL

This is web application for build website <a href="http://job.grandtjokro.com/" target="_blank">Job Sas Hospitality</a>. This site not use database, all data getting from primary website what I build to using laravel and combine with fitur laravel passport to create API. So if you want to clone this website you MUST create API to supply data to this site.

## How to install
1. Clone this repository
2. Go to path repository
3. Composer install
4. Create file <b>server.php</b> in config/app.
5. Add configuration 
" <?php
 return [
    "base_url" => "",
    "access_token" => "",
    'image_url' => "",
 ]; "

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
