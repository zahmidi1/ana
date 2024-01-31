<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\Invoice_partenaireController;
use App\Http\Controllers\MilkReceptionController;
use App\Http\Controllers\HistoriqueController;


use App\Models\invoice;
use Illuminate\Support\Facades\Auth;
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


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('site.home');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


// clients
Route::get('/client', [App\Http\Controllers\ClientsController::class, 'index'])->name('client');
Route::post('/client/store', [App\Http\Controllers\ClientsController::class, 'store'])->name('client_store');
Route::get('/client/show/{id}', [App\Http\Controllers\ClientsController::class, 'show'])->name('client_show');

Route::get('/desactive/{id}', [App\Http\Controllers\ClientsController::class, 'active'])->name('activeClient');
Route::get('/active/{id}', [App\Http\Controllers\ClientsController::class, 'desactive'])->name('desactiveClient');



// milk_reception
Route::post('/milk_reception/store', [App\Http\Controllers\MilkReceptionController::class, 'store'])->name('milk_store');
Route::get('/milk_reception', [App\Http\Controllers\MilkReceptionController::class, 'index'])->name('milk_reception');
Route::post('/afficherTotalLait', [App\Http\Controllers\MilkReceptionController::class, 'lait'])->name('afficherTotalLait');

//  invoice
Route::post('/invoice/', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice');
Route::put('/enregistrer', [App\Http\Controllers\InvoiceController::class, 'create'])->name('enregistrer');
Route::get('/client/historique/invoive/{id}', [App\Http\Controllers\InvoiceController::class, 'historique'])->name('historique_invoive');
Route::get('/client/historique/invoive/afficher/{id}/{id_cli}/{date_pay}', [App\Http\Controllers\InvoiceController::class, 'afficher'])->name('afficher_invoive');
Route::get('/client/historique/invoive/afficher/{id}/{id_cli}/{date_pay}/generate', [App\Http\Controllers\InvoiceController::class, 'telecharger'])->name('telecharger_invoive');



// eror
Route::get('/client/edit/{id}', [App\Http\Controllers\ClientsController::class, 'edit'])->name('client_edit');
Route::post('/client/create', [App\Http\Controllers\ClientsController::class, 'create'])->name('client_create');

Route::get('/milk_reception/show/{id}', [App\Http\Controllers\MilkReceptionController::class, 'show'])->name('milk_show');

Route::get('//milk_reception/delete/{id}', [App\Http\Controllers\MilkReceptionController::class, 'destroy'])->name('milk_destroy');

Route::get('/milk_reception/edit/{id}', [App\Http\Controllers\MilkReceptionController::class, 'edit'])->name('milk_edit');

Route::post('/milk_reception/create', [App\Http\Controllers\MilkReceptionController::class, 'create'])->name('milk_create');
Route::post('/rest', [App\Http\Controllers\MilkReceptionController::class, 'rest'])->name('rest');


Route::resource('historique', HistoriqueController::class);


/////  factute de patnere  et ajouter  patrer
Route::resource('partenaire', PartenaireController::class);

Route::resource('invoice_partenaire', 'Invoice_partenaireController');
Route::resource('sort_lait', 'Sort_laitController');