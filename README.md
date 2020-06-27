## About BTC Portfolio Website

BTC Portfolio is a responsive Personal Portfolio Laravel Script It’s suitable for Resume or Portfolio websites. This Script can be used for personal portfolio, artist portfolio and freelancer portfolio and coder, company, web developer. It’s comfortable with Laptops, tablets, mobiles or any device. BTC Portfolio is 100% responsive and supports the most popular browsers. All codes are clean and nicely commented.

-   Fully Dynamic.
-   Customizable Color and Media Easily.
-   Enable and Disable any Section With One Click.
-   User Friendly.
-   Custom Css or Js.
-   Laravel 7.x.

## Developing

**Getting Started**

*Clone this repo:*

```
git clone https://github.com/InfernoX0/BTC-Portfolio-Website.git
```

*Install php dependencies:*

```
composer install
```

*Copy the env.example file to .env and generate new key:*

```
cp .env.example .env

php artisan key:generate
```

*Go to the .env file and change the database credentials to your database:*

*Migrate the database:*

```
php artisan migrate
```

**Workflow**

*Serve the project:*

```
php artisan serve
```

*Login and access project* 

Login logic is contained in the /login route in the underlying Laravel instance. To login and access the project, simply hit the /login route A user will be logged in and you will be redirected to /manager. Hitting the login route also reruns the migrations and seeds it or use the keyboard shortcut.

```
shift + z
```

and use the default email : **admin@admin.com** and password : **password**

## Built with

-   **[Vue.js as a JavaScript framework](https://vuejs.org/)**
-   **[Laravel as a PHP framework used as an API endpoint](https://laravel.com/)**
-   **[Bootstrap as a CSS framework](https://getbootstrap.com/)**
-   **[AdminLTE as Admin Panel](https://adminlte.io/)**

## Browser / OS / Device support

-   IE 11, Edge, Chrome, Firefox, Safari, Opera
-   Windows, Mac, iOS, Android
-   Desktop, Tablet, Mobile

## License

BTC Portfolio is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)
