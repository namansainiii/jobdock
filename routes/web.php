<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    // return view('welcome');
    return 'hello';
});

Route::get('/jobs', function(){
    // return '<h1>Yes jobs!</h1>';
    $url = route('jobsCreate');
    // return view('jobs.index', [
    //     'url' => $url
    // ]);
    $title = 'Available jobs';
    $jobs = [
        'Software Developer',
        'Java Developer',
        'Php Developer',
        'C Developer',
        'Python Developer'
    ];
    return view('jobs.index', compact('url', 'title' , 'jobs'));
})->name('jobsName');



Route::get('/jobs/create' , function(){
    $url = route('jobsName');

    // return view('jobs.create', [
    //     'url' => $url
    // ]);

    // return view('jobs.create')->with('url', $url);

    return view('jobs.create', compact('url'));

})->name('jobsCreate');


Route::get('/testJobs', function(){
    $url = route('jobsName');
    return "<a href='$url'>Click</a>";
});



Route::post('/submit', function(){
    return 'Form submitted';
});


Route::match(['get', 'post'] , '/submits', function(){
    return 'Form submitted with match';
});


Route::any('/submitAny', function(){
    return 'Form submitted with any';
});


Route::get('/api/users', function(){
    return [
        'name' => 'Namanpreet Kaur',
        'email' => 'namansaini960@gmail.com'
    ];
});

Route::get('/jobs/{id}', function(string $id){
    return 'Post: '. $id;
})->where('id', '[0-9]+');

// Route::get('/jobs/{id}', function(string $id){
//     return 'Post: '. $id;
// })->whereNumber('id');

//this will allow integer as globally for id contraints are defined
// Route::get('/jobs/{id}', function(string $id){
//     return 'Post: '. $id;
// });


Route::get('/names/{name}', function(string $name){
    return 'Name: '. $name;
})->where('name', '[a-zA-Z]+');

// Route::get('/names/{name}', function(string $name){
//     return 'Name: '. $name;
// })->whereAlpha('name');


Route::get('jobs/{id}/comments/{comment}', function(string $id, string $comment){
    return 'Posts: '. $id. ' Comments: '. $comment;
})->where('id' , '[0-9]+')->where('comment' , '[a-zA-Z0-9]+');


// Route::get('jobs/{id}/comments/{comment}', function(string $id, string $comment){
//     return 'Posts: '. $id. ' Comments: '. $comment;
// })->whereNumber('id')->whereAlphaNumeric('comment');

Route::get('/test', function(Request $request){
    return [
        'method' => $request->method(),
        'url' => $request->url(),
        'path' => $request->path(),
        'fullUrl' => $request->fullUrl(),
        'ip' => $request->ip(),
        'userAgent' => $request->userAgent(),
        'header' => $request->header(),
    ];
});

Route::get('/getData', function(Request $request){
    // return $request->only(['name', 'age']);
    // return $request->all();
    // return $request->has('naman');
    return $request->except('name');

    /*difference between query and input 
    query: will give data only from url
    input : will give pata fron url + form fields 
    also in input you can provide default value if the value is not present */

    // return $request->input('name', 'Namanpreet Kaur');
    // return $request->query('name');
});


Route::get('/notFound', function(){
    //404: will give actuall error if you check in network
    // return response('error', 404);

    //this text will be shown as plan text which will include h1 tags also 
    // return response('<h1>heading</h1>', 202)->header('Content-Type', 'text/plain');

    //this will print heading 
    // return response('<h1>heading</h1>', 202)->header('Content-Type', 'text/html');

    //this will return you json aaray
    return response()->json(['name' => 'Namanpreet']);
});

Route::get('/download', function(){
    return response()->download(public_path('favicon.ico'));
});


Route::get('/storeCookie', function(){
    return response('Cookie Set')->cookie('name', 'param');
});

Route::get('/getCookie', function(Request $request){
    $cookieValue = $request->cookie('name');
    return response()->json(['cookie' => $cookieValue]);
});
