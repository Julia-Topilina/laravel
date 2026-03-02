<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Carpet;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;


abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;
}
