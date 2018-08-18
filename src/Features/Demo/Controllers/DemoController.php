<?php

namespace Laraning\Flame\Features\Demo\Controllers;

use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    public function __construct()
    {
        // Add your middleware, if needed.
    }

    public function index()
    {
        return flame();
    }
}
