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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test/{name?}', function ($name = 'TutorialsPoint') { return $name;})->name('test');;

Route::get('age',['middleware' => 'Age:25', 'uses' => 'TestController@index',]);

Route::get('terminate',[
   'middleware' => 'Terminate',
   'uses' => 'TerminateTestController@index',
]);

class MyClass{
   public $foo = 'bar';
}
Route::resource('foo/myclass','ImplicitController');

Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');

Route::get('redirect',function() {
   return redirect()->route('test');
});

Route::get('students','StudInsertController@index');
Route::get('insert','StudInsertController@create');
Route::post('create','StudInsertController@store');
Route::get('edit/{id}','StudInsertController@edit');
Route::post('edit/{id}','StudInsertController@update');
Route::get('delete/{id}','StudInsertController@destroy');

Route::get('localization/{locale}','LocalizationController@index');

Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');

Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('ajax',function() {
   return view('ajax_view');
});
Route::post('/getmsg','AjaxController@index');
