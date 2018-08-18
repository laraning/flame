<p align="center"><img src="https://flame.laraning.com/assets/logos/logo-deploy.jpg"></p>

<p align="center">
<a href="https://travis-ci.org/laraning/flame"><img src="https://travis-ci.org/laraning/flame.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laraning/flame"><img src="https://poser.pugx.org/laraning/flame/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laraning/flame"><img src="https://poser.pugx.org/laraning/flame/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laraning/flame"><img src="https://poser.pugx.org/laraning/flame/license.svg" alt="License"></a>
<a href="https://github.styleci.io/repos/145177976"><img src="https://github.styleci.io/repos/145177976/shield" alt="Style CI"></a>
</p>

## About Flame

Laraning Flame is a Feature Development-driven framework that will improve the way you structure and develop your application features.

If you use this package you will:
* Create your features in a standard code-convention way.
* Create and re-use graphical components (called Twinkles) that will make you improve your layout code structure.
* Be able to execute Controller actions inside Twinkles prior to the view rendering.
* Structure your application as feature modules, having a much better code readability, structure and reusability!

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

1. You can install this package via composer using this command:

```bash
composer require laraning/flame
```

The package will automatically register itself (using [auto-discover](https://laravel-news.com/package-auto-discovery)).

2. Next step is to publish the flame.php configuration file into your config folder.

```bash
php artisan vendor:publish --tag=flame-configuration
```

3. There is no step 3! All done! :smile:

## Contributing

At the moment you don't need to contribute since Flame is still in development.

## License

Laraning Flame is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).