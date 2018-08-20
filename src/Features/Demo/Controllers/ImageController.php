<?php

namespace Laraning\Flame\Features\Demo\Controllers;

use App\Http\Controllers\Controller;
use Laraning\Flame\Services\UserService;

class ImageController extends Controller
{
    public function __construct()
    {
        // Add your middleware, if needed.
    }

    public function index(UserService $user)
    {
        dd($user);
    }
}
