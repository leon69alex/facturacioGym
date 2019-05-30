<?php

//AUTENTICACIÓ
Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout');

//INICI
Route::get('/', 'HomeController@index')->name('home');
Route::get('instalacions', 'HomeController@instalacions')->name('instalacions');
Route::get('contacta', 'HomeController@contacta')->name('contacta');



/******FACTURACIÓ******/
/*CLIENTS*/
//A les rutes d'aquest grup nomès hi podràn accedir els usuaris que tinguin rols de administrador o moderador
Route::middleware(['auth', 'roles:admin,mod'])->group(function () {

    Route::resource('clients', 'ClientsController');
    Route::get('clients/send/email/{id}', 'ClientsController@sendEmailImpagament'); //ENVIAR CORREU DE IMPAGAMENT//
    Route::post('clients/ajaxRequest', 'ClientsController@switchClients');

});
Route::get('importClients', 'ClientsController@importClients')->middleware(['auth', 'roles:admin']);


/*CUOTES*/
//Amb una sola línia de codi fem totes les rutes del CRUD
Route::resource('cuotes', 'CuotesController')->middleware(['auth', 'roles:admin,mod']);

/*REMESES*/
//A les rutes d'aquest grup nomès hi podràn accedir els usuaris que tinguin rols de administrador o moderador
Route::middleware(['auth', 'roles:admin,mod'])->group(function () {

    Route::get('remeses', 'RemesesController@index')->middleware(['auth', 'roles:admin,mod']);
    Route::get('remeses/show/{id}', 'RemesesController@show')->middleware(['auth', 'roles:admin,mod']);
    Route::get('remeses/generate', 'RemesesController@generate')->middleware(['auth', 'roles:admin']);

});
Route::get('remeses/generate-pdf/{id}','RemesesController@generatePDF')->middleware(['auth', 'roles:admin']);


/*ADMIN*/
//VOYAGER(PANELL DE ADMINISTRACIÓ)
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/*USUARIS*/
//Route::get('edit_profile', 'UsersController@edit')->name('edit_profile');

Route::get('users/profile/{id}', [
    'as' => 'users.profile',
    'uses' => 'UsersController@edit'
    ])->middleware('auth');

Route::put('users/profile/{id}', [
    'as' => 'users.update',
    'uses' => 'UsersController@update'
    ]);

Route::get('users/planning/{id}', function(){
    return view('users.planning');
});



//GOOGLE OAUTH ==> SOCIALITE
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

//GITHUB OAUTH ==> SOCIALITE
Route::get('login/github', 'Auth\LoginController@redirectToGithub');
Route::get('login/github/callback', 'Auth\LoginController@handleGithubCallback');


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

for($i = 0; $i < 100; $i++) {

    $name = $faker->firstName;
    $iban = $faker->iban('ES');
    App\Client::create([
        'name' => $name,
        'surnames' => $faker->lastName,
        'email' => $name.'@'.$faker->freeEmailDomain,
        'dni' => $faker->dni,
        'cuote_id' => 1,
        'CCC' => substr($iban,3),
        'IBAN' => $iban,
    ]);
}*/
