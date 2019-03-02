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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('clients', 'ClientsController');

Route::get('/search','ClientsController@search');

Route::resource('cuotes', 'CuotesController');


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
} */
