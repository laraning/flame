<?php

// Demo route.
Route::get('flame', 'Laraning\Flame\Features\Demo\Controllers\DemoController@index')
       ->name('flame.index')
       ->middleware('web');
