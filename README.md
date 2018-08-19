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

I've built Flame because I was starting to have medium size web apps (like [Laraning](https://www.laraning.com) or [Laraflash](https://www.laraflash.com)) with a lot of Blade views, Blade Components.
It was starting to be difficult to organize my features in a way that I could load datainside those views given for the respective controller action that I was running at a certain moment.
A thought came to me: "What if I have a way to know automatically what actions am I running and then automatically load my graphical
layout accordingly to that action, reusing the layout and not just create more and more views?"

That's where Flame started. Flame will automate this behaviour for you. Let's see how.

## How it works

After installing Flame, let's follow this step-by-step guide to see how Flame works.

The flame.php configuration file already have an entry to put all your features in the App\Flame\Features namespace.

Create a new feature using the following command:

```bash
php artisan make:feature
```

Select the "flame" namespace group, then create a "Manage Cars" feature, and the action "index".
At the end, the route example that the command give you will be:

```bash
Route::get('manage-cars', '\App\Flame\Features\ManageCars\Controllers\ManageCarsController@index')
     ->name('manage-cars.index');
```

##### :point_right: Copy+Paste this route example to your web.php file (or other route file you're using with web middleware).

##### :floppy_disk: A new folder "ManagesCars" is created inside your "app\Flame\Features" folder.

#### Feature "Manage Cars" file structure

```bash
  + ManageCars
    + Controllers
      > ManageCarsController.php
      > WelcomeController.php
    + Panels
      > index.blade.php
    + Twinkles
      > welcome.blade.php
```

Let's now see what was scaffolded on each of those files. The magic starts :heart: !

```php
class ManageCarsController extends Controller
{
    public function index()
    {
        return flame();
    }
```

This is where you point out your route file. You just need to return the flame() helper so the framework will
capture your action and render the respective Panel.

:exclamation: Flame will then render the view with the same action name that you're currently running. In this case it will run the Panels/index.blade.php automatically! Sweet!

> ##### In case you don't have a Panel with the same name, then it will fall back to default.blade.php. If you have a Panel with this name, it will be loaded for all of your actions that don't have a specific Panel action. Double sweet!

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