<?php

use App\Models\Comment;
use App\Models\Reservation;
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

    // $results = User::select('name', 'email')
    //     ->addSelect([
    //         'worst_rating' => Comment::select('rating')
    //             ->whereColumn('user_id', 'users.id')
    //             ->orderBy('rating', 'asc')
    //             ->limit(1)
    //     ])
    //     ->get()->toArray();

    // $results = User::orderByDesc(
    //     Reservation::select('check_in')
    //         ->whereColumn('user_id', 'users.id')
    //         ->orderBy('check_in', 'desc')
    //         ->limit(1)
    // )->select('id', 'name')->get()->toArray();

    // $results = Reservation::chunk(2, function ($reservations) {
    //     foreach ($reservations as $reservation) {
    //         echo $reservation->id;
    //     }
    // });

    // $results = User::find(1)->toArray();
    // $results = User::where('email', 'like', '%@%')->first()->toArray();
    // $results = User::where('email', 'like', '%@example.com%')->firstOr(function () {
    //     User::where('id', 1)->update(['email' => 'lyly92@example.com']);
    // });
    // $results = User::findOrFail(100); // firstOrFail also possible
    // $results = Comment::withoutGlobalScope('rating')->get();
    // $results = Comment::rating(1)->get();
    // $results = Comment::all()->toArray();
    // $results = Comment::all()->count();
    // $results = Comment::all()->toJson();

    // $comments = Comment::all();
    // $results = $comments->map(function ($comment) {
    //     return $comment->content;
    // });
    // $results = $comments->reject(function ($comment) {
    //     return $comment->rating < 3;
    // });
    // $results = $comments->diff($results);

    $results = Comment::create([
        'user_id' => 1,
        'rating' => 5,
        'content' => 'comment content',
    ]);

    dump($results->toArray());

    return view('welcome');
});
