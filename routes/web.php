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

    // $results = DB::table('rooms')->whereBetween('room_size', [1, 3])->get();
    // $results = DB::table('rooms')->whereNotIn('id', [1, 2, 3])->get();

    // $results = DB::table('users')
    //     ->whereExists(function ($query) {
    //         $query->select('id')
    //             ->from('reservations')
    //             ->whereRaw('reservations.user_id = users.id')
    //             ->where('check_in', '=', '2022-12-02')
    //             ->limit(1);
    //     })
    //     ->get();

    // $results = DB::table('users')
    //     // ->whereJsonContains('meta->skills', 'Laravel')
    //     ->whereJsonContains('meta->settings->site_language', 'en')
    //     ->get();

    // $results = DB::table('users')
    //     ->orderBy('name', 'desc')
    //     ->get();

    // $results = DB::table('users')
    //     ->latest() // created_at default
    //     ->first();

    // $results = DB::table('users')
    //     ->inRandomOrder() // created_at default
    //     ->first();

    // $results = DB::table('comments')
    //     ->selectRaw('count(content) as number_of_5stars_comments, rating') // hoặc là count(id)
    //     ->groupBy('rating')
    //     ->where('rating', '=', 3) // hoặc là ->having('rating', '=', 3)
    //     ->get();

    // $results = DB::table('comments')
    //     ->skip(5) // bỏ qua 5 cái đầu
    //     ->take(5) // lấy 5 cái tiếp theo
    //     ->get();

    // $results = DB::table('comments')
    //     ->offset(5) // bỏ qua 5 cái đầu
    //     ->limit(5) // lấy 5 cái tiếp theo
    //     ->get();

    // $room_id = 2;
    // $results = DB::table('reservations')
    //     ->when($room_id, function ($query, $room_id) {
    //         return $query->where('room_id', $room_id);
    //     })
    //     ->get();

    // $sortBy = null;
    // $results = DB::table('rooms')
    //     ->when($sortBy, function ($query, $sortBy) {
    //         return $query->orderBy($sortBy);
    //     }, function ($query) {
    //         return $query->orderBy('price');
    //     })
    //     ->get();

    // $results = DB::table('comments')->orderBy('id')->chunk(2, function ($comments) {
    //     foreach ($comments as $comment) {
    //         if ($comment->id == 5) return false;
    //     }
    // });

    // day la phuong phap update cai gi do
    // $results = DB::table('comments')->orderBy('id')->chunkById(5, function ($comments) {
    //     foreach ($comments as $comment) {
    //         DB::table('comments')
    //             ->where('id', $comment->id)
    //             ->update(['rating' => null]);
    //     }
    // }); // useful for administration tasks

    // ========================================================================
    // cách 1
    // $results = DB::table('reservations')
    //     ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
    //     ->join('users', 'reservations.user_id', '=', 'users.id')
    //     ->where('rooms.id', '>', 3)
    //     ->where('users.id', '>', 1)
    //     ->get();

    // cách 2
    // $results = DB::table('reservations')
    //     ->join('rooms', function ($join) {
    //         $join->on('reservations.room_id', '=', 'rooms.id')
    //             ->where('rooms.id', '>', 3);
    //     })
    //     ->join('users', function ($join) {
    //         $join->on('reservations.user_id', '=', 'users.id')
    //             ->where('users.id', '>', 1);
    //     })
    //     ->get();

    // cách 3
    // $rooms = DB::table('rooms')->where('id', '>', 3);
    // $users = DB::table('users')->where('id', '>', 1);
    // $results = DB::table('reservations')
    //     ->joinSub($rooms, 'rooms', function ($join) {
    //         $join->on('reservations.room_id', '=', 'rooms.id');
    //     })
    //     ->joinSub($users, 'users', function ($join) {
    //         $join->on('reservations.user_id', '=', 'users.id');
    //     })
    //     ->get();
    // ============================================================================

    $results = DB::table('rooms')
        ->leftJoin('reservations', 'rooms.id', '=', 'reservations.room_id')
        ->leftJoin('cities', 'reservations.city_id', '=', 'cities.id')
        ->selectRaw('room_size, cities.name, count(reservations.id) as reservations_count')
        ->groupBy('room_size', 'cities.name')
        ->orderByRaw('count(reservations.id) DESC')
        ->get();

    dump($results);

    return view('welcome');
});
