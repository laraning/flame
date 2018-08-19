<p align="center"><img src="https://flame.laraning.com/assets/logos/logo-deploy.jpg" width="150"></p>

<p align="center">
<a href="https://travis-ci.org/laraning/flame"><img src="https://travis-ci.org/laraning/flame.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laraning/flame"><img src="https://poser.pugx.org/laraning/flame/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laraning/flame"><img src="https://poser.pugx.org/laraning/flame/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laraning/flame"><img src="https://poser.pugx.org/laraning/flame/license.svg" alt="License"></a>
<a href="https://github.styleci.io/repos/145177976"><img src="https://github.styleci.io/repos/145177976/shield" alt="Style CI"></a>
</p>

## About Flame

Laraning Flame is a Feature Development-driven framework that will improve the way you structure and
develop your application features.

If you use this package you will:
* Create your features in a standard code-convention way.
* Create and re-use graphical components (called Twinkles) that will make you improve your layout code structure.
* Be able to execute Controller actions inside Twinkles prior to the view rendering.
* Structure your application as feature modules, having a much better code readability, structure and reusability!

## Why Flame

I've built Flame because I was starting to have medium size applications with a lot of Blade views, components and
it was difficult to pass Controller data results inside those views given the type of controller action that I was running.
So, I thought "what if I have a way to know automatically what actions am I running and then automatically load my graphical
layout accordingly to that action, reusing the layout and not just create more and more views?"

Flame will automate this for you.

You will create your Panels and Twinkles, and if they have a Controller attached to them they will then received the returned data automatically prior to the rendering!

## How it works

The flame.php configuration file already have an entry to put all your features in the App\Flame\Features namespace.
Let's follow up from there...

Create a new feature using the following command:

```bash
php artisan make:feature
```

Select the "flame" namespace group, then create a "Manage Cars" feature, and the action "index".
At the end, the route example that the command give you will be:
```bash
Route::get('manage-cars', '\App\Flame\Features\ManageCars\Controllers\ManageCarsController@index')->name('manage-cars.index');
```

Copy+Paste this route example to your web.php file (or other route file you're using with web middleware).


```php
Route::get('register', 'App\Features\Registration\RegistrationController@index');
```

In your Controller file, you just need to return the flame helper function:

```php
class RegistrationController extends Controller
{
    public function index()
    {
        return flame();
    }
```

#### TwinkleController.php
```php
class TwinkleController extends Controller
{
    public function index()
    {
        return ['text' => 'Hi there! This is a Twinkle running in the index action!'];
    }

    public function show()
    {
        return ['text' => 'Hi there! And this one will run in the show action!'];
    }
}
```
On your Panel file, you just need to write:
#### default.php
```blade
Message from Twinkle: @twinkle('welcome')
```
And Flame will render the respective



## Current development status
- [x] Finish core development.
- [ ] Finish identified issues/improvements for Alpha release 0.1.x.
- [ ] Close Alpha (0.1.x) release.
- [ ] Finish identified issues/improvements for Beta release 0.2.x.
- [ ] Close Beta (0.2.x) release.
- [ ] Test coverage > 90%.
- [ ] Finalize documentation.
- [ ] Finalize video tutorials.
- [ ] Release for General Public use.

## Installation

You can install this package via composer using this command:

```bash
composer require laraning/flame
```

###### The package will automatically register itself (using [auto-discover](https://laravel-news.com/package-auto-discovery)).

Next step is to publish the flame.php configuration file into your config folder.

```bash
php artisan vendor:publish --tag=flame-configuration
```

All done! :smile:

## Getting started

Flame creates a demo route on your /flame url. You can try it and should see:
<p align="center"><img src="https://flame.laraning.com/assets/github/preview.jpg" width="400"></p>

This means that you have can see the Demo feature located in the Laraning\Flame\Features\Demo namespace.

## Creating your first Feature

Simple as this. Just write the following command:

```bash
php artisan make:feature
```

## Contributing

At the moment you don't need to contribute since Flame is still in development.

## License

Laraning Flame is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).