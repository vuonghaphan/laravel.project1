<?php

use App\Http\Controllers\UserssController;
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
    return view('welcome');
});
Route::group(['prefix' => 'userss'
], function () {
    Route::get('','UserssController@getUser');

    Route::get('edits/{id}','UserssController@getEdits_User');
    Route::post('edits/{id}','UserssController@postEdits_User');

    Route::get('adds','UserssController@getAdds_User');
    Route::post('adds','UserssController@postAdds_User');

    Route::get('del/{id}','UserssController@delUserss');
});
Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin');
Route::get('convPas', function () {
    $user = App\User::all();
    foreach ($user as $us ) {
        $u = App\User::find($us->id);
        $u->password = bcrypt('1');
        $u->save();
    }
});




