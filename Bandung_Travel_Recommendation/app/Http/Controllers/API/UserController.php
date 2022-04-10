<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Library\ApiHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Favorite;
use App\Models\FavoritePlaceItems;
use App\Models\UserInteractLogs;

class UserController extends Controller
{
    use ApiHelpers;
    //
}
