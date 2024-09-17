<?php

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

Route::view('/','home.index')
    ->name('home.index');
Route::view('/contact', 'home.contact')
    ->name('home.contact');

Route::get('/post/{id}',function($id){
    $posts = [

        1 => [
            'title'=> 'Intro to Laravel',
            'content'=> 'This is a short intro to Laravel'
        ],
        2 => [
            'title'=> 'Intro to PHP',
            'content'=> 'This is a short intro to PHP'
        ]
    ];
    abort_if(!isset($posts[$id]), 404);

    return view('posts.show',['post' =>$posts[$id]]);

   
})
// ->where([
//     'id'=> '[0-9]+'
// ])
->name('posts.show');

Route::get('/recent-posts/{days_ago?}',function($daysago = 20){
    return 'Post from '. $daysago. ' days ago';
})->name('posts.recent.index');


