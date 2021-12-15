A test Blog project with Laravel 8 and Vue 3 + Quasar 2

In this project Post data is static and we just focused on Comment
We have Comment model and migration

In this project I have used Quasar for SPA.
I've used `laravel-nestedset` package for hierarchical Comments.

How to run?
Firstly go to project root directory and run:

```
composer install

php artisan serve
```

Please make sure it runs on `localhost:8000` because if it runs on different port or ip, you have to set it in `quasar.conf.js` file.

and for frontend part, in project root directory goto frontend directory and run:


```
npm install

quasar dev
```

It will open a browser tab.

Everything should work fine.
