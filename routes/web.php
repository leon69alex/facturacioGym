<?php

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

//AUTENTICACIÓ
Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout');

//INICI
Route::get('/', function () {
    return view('home');
})->name('home');


/*FACTURACIÓ*/
//CLIENTS
Route::resource('clients', 'ClientsController');
Route::resource('cuotes', 'CuotesController')->middleware('verified');
//Route::get('/search','ClientsController@search');


/*ADMIN*/
//VOYAGER(PANELL DE ADMINISTRACIÓ)
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/*USUARIS*/
Route::get('edit_profile', 'UsersController@edit');

//GOOGLE OAUTH ==> SOCIALITE
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

//GOOGLE OAUTH ==> SOCIALITE
Route::get('login/github', 'Auth\LoginController@redirectToGithub');
Route::get('login/github/callback', 'Auth\LoginController@handleGithubCallback');



//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

//Route::get('/home', 'HomeController@index')->name('home');

//Route::post('login', 'Auth\LoginController@login');

/*Route::post('login', function(){
    return "HOLA";
});*/



/* Route::get('/serverSide', [
    'uses' => function () {
        $users = App\Client::all();
        dd($users);
        return Datatables::of($users)->make();
    }
])->name('serverSide'); */


//CREAR CLIENTS MASSIVAMENT DE PROVA.

//https://github.com/fzaninotto/Faker
/* $faker = Faker\Factory::create();

$faker = new Faker\Generator();
$faker->addProvider(new Faker\Provider\es_ES\Person($faker));
$faker->addProvider(new Faker\Provider\es_ES\Address($faker));
$faker->addProvider(new Faker\Provider\es_ES\PhoneNumber($faker));
$faker->addProvider(new Faker\Provider\es_ES\Company($faker));
$faker->addProvider(new Faker\Provider\Lorem($faker));
$faker->addProvider(new Faker\Provider\Internet($faker));
$faker->addProvider(new Faker\Provider\Payment($faker));

for($i = 0; $i < 1000; $i++) {

    $name = $faker->firstName;
    App\Client::create([
        'name' => $name,
        'surnames' => $faker->lastName,
        'email' => $name.'@'.$faker->freeEmailDomain,
        'dni' => $faker->dni,
        'cuote_id' => 1,
        'numCompte' => $faker->iban('ES'),
    ]);
}
 */
