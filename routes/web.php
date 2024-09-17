<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     //return view('welcome');
//     return view('home.index',[]);
// })->name('home.index');


// Route::get('/contact',function(){
//     return view('home.contact');
// })->name('home.contact');

Route::get('/',[HomeController::class, 'home'])
    ->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])
    ->name('home.contact');

Route::get('/hello',HomeController::class);

Route::get('/single',AboutController::class);

    $posts = [

        1 => [
            'title'=> 'Intro to Laravel',
            'content'=> 'This is a short intro to Laravel',
            'is_new'=> true,
            'has_comments' => true

        ],
        2 => [
            'title'=> 'Intro to PHP',
            'content'=> 'This is a short intro to PHP',
            'is_new'=> false
        ],
        3 => [
            'title'=> 'Intro to JavaScript',
            'content'=> 'This is a short intro to JavaScript',
            'is_new'=> true,
           

        ],
        4=> [
            'title'=> 'Intro to Vue.js',
            'content'=> 'This is a short intro to Vue.js',
            'is_new'=> false,
            'has_comments' => true

        ],
    ];  
    
    Route::resource('posts', PostController::class)->only(['index','show']);


// Route::get('/posts',function() use($posts){
//     //dd(request()->all());
//     dd((int)request()->query('page',1));
//     return view('posts.index',['posts' => $posts]);
// });

// Route::get('/post/{id}',function($id) use($posts){
//     abort_if(!isset($posts[$id]), 404);
//     return view('posts.show',['post' =>$posts[$id]]);

   
// })
// // ->where([
// //     'id'=> '[0-9]+'
// // ])
// ->name('posts.show');

Route::get('/recent-posts/{days_ago?}',function($daysago = 20){
    return 'Post from '. $daysago. ' days ago';
})->name('posts.recent.index')->middleware('auth');

Route::prefix('/fun')->name('fun.')->group(function() use($posts){

Route::get('responses',function() use($posts){
    return response($posts, 201)
    ->header('Content-type','application/json')
    ->cookie('MY_COOKIE','Shawon',3600);
})->name('resposne');

Route::get('redirect', function(){
    return redirect('/contact');
})->name('redirect');

Route::get('back', function(){
    return back();
})->name('back');

Route::get('named-route', function(){
    return redirect()->route('posts.show',['id'=>3]);
})->name('named-route');

Route::get('away', function(){
    return redirect()->away('https://www.google.com');
})->name('away');

Route::get('json', function() use($posts){
    return response()->json($posts);
})->name('json');

Route::get('download', function() use($posts){
    return response()->download(public_path('/daniel.jpg'), 'face.jpg');
})->name('downlaod');

});
