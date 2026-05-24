<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;

abstract class AdminController extends Controller
{
    // Admin middleware removed - admins can access without login
}
