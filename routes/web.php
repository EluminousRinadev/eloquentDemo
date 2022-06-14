<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

Route::get('/view', function () {
    return view('welcome');
});

Route::get('phpmyinfo', function () {
    phpinfo();
    });

Route::get('member',[MemberController::class,'index']);

Route::get('/users',function(){

    $user = \App\Models\User::with('address','addresses')->get();//use to check hasOne and hasMany relationship
     
    // dd($user);
    $addresses = \App\Models\Address::all(); //use to check belongs to relationship

    return view('users.index',compact('user','addresses'));

});


Route::get('/posts',function(){

    // \App\Models\Post::create([
    //     'user_id'  => '1',
    //     'title'  => 'Just testing the theme'
    // ]);

    // \App\Models\Post::create([
    //     'user_id'  => '2',
    //     'title'  => 'Just testing the theme2'
    // ]);

    $posts=\App\Models\Post::with('user')->get();

    // dd($posts);

    return view('posts.index',compact('posts'));


});


Route::get('/posts1',function(){

    \App\Models\Tag::create([
        'name'  => 'Laravel'
        
    ]);
    \App\Models\Tag::create([
        'name'  => 'Php'
        
    ]);

    \App\Models\Tag::create([
        'name'  => 'Javascript'
        
    ]);

    \App\Models\Tag::create([
        'name'  => 'Vuejs'
        
    ]);


    $posts=\App\Models\Post::with('user')->get();

    // dd($posts);

    return view('posts.index',compact('posts'));


});

Route::get('/tags',function(){

    $tags= \App\Models\Tag::with('post')->get();

    return view('tag.index',compact('tags'));

});

Route::get('/mechanics',function(){

    $mechanics= \App\Models\Mechanics::with('carOwner')->get();

    return view('mechanics.index',compact('mechanics'));

});

Route::get('/post_show',function(){

    $post= \App\Models\Post::find(2);
    $tag=[1,4];
    // $post->tag()->attach($tag);
    $post->tag()->sync($tag); //attach and syncronous working same but sync method does not add repeated value 

    $tag = \App\Models\Tag::find(1);

    dd($tag);

    return view('posts.show',compact('mechanics'));

});

Route::get('/morpTo',function(){

    $post= \App\Models\Post::with('comment')->find(1);

    $Videos= \App\Models\Videos::with('comment')->find(2);

    dd($Videos);

    // return view('mechanics.index',compact('mechanics'));

});


Route::get('/hasmany',function(){

    $posts= \App\Models\Post::get();

    $posts= \App\Models\Post::has('comments')->get();//if we want only those record who have coments

    // return view('mechanics.index',compact('mechanics'));

});


Route::get('pluck',function(){

    $pluck = \App\Models\User::where('id', 1)->pluck('name','id');

    dd($pluck);

});

Route::get('touch',function(){

    $touch = \App\Models\User::find(1);

    // $article->touch();

    dd($touch->touch());
});
// Route::get('greeting', function () {return 'Hello World';});

