<?php

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

    // $users = DB::table('users')->get();
    // $users = DB::table('users')->pluck('email');
    // $users = DB::table('users')->find(1);

    // $comments = DB::table('comments')->select('content as comment_content')->get();
    // $comments = DB::table('comments')->select('user_id')->distinct()->get();

    // $results = DB::table('comments')->count();
    // $results = DB::table('comments')->sum('user_id');
    // $results = DB::table('comments')->where('content', 'content')->doesntExist();

    // $results = DB::table('rooms')->get();
    // $results = DB::table('rooms')->where('price', '<', '200')->get();
    // $results = DB::table('rooms')->where([
    //     ['room_size', '2'],
    //     ['price', '<', '400']
    // ])->get();
    // $results = DB::table('rooms')
    //     ->where('room_size', '=', '2')
    //     ->orWhere('price', '<', '400')
    //     ->get();
    // $results = DB::table('rooms')
    //     ->where('price', '<', '400')
    //     ->orWhere(function ($query) {
    //         $query
    //             ->where('room_size', '>', '1')
    //             ->where('room_size', '<', '4');
    //     })
    //     ->get();

    $results = DB::table('rooms')->whereBetween('room_size', [1, 3])->get();
    $results = DB::table('rooms')->whereNotIn('id', [1, 2, 3])->get();

    dump($results);

    return view('welcome');
});
