<?php

use App\Models\Address;
use App\Models\City;
use App\Models\Comment;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $results = Address::find(1);
    // $results = User::find(1);
    // $results = Comment::find(1);

    // $results = Room::where('room_size', 3)->get();

    // foreach ($results as $rooms) {
    //     foreach ($rooms->cities as $city) {
    //         echo $city->name . '<br>';
    //         echo $city->pivot->room_id . '<br>';
    //         dump($city->pivot->created_at);
    //     }
    // }

    $results = Comment::find(6);
    dump($results->country->name);

    return view('welcome');
});
