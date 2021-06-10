<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GitHubController;
use Inertia\Inertia;

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

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::middleware(['auth:sanctum', 'verified'])->get('/', [
        DashboardController::class,
        'index'
    ])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/clients', [
        ClientsController::class, 
        'index'
    ])->name('clients.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/clients/show/{id}', [
    ClientsController::class, 
    'show'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/clients/create', [
    ClientsController::class, 
    'create'
])->name('clients.create');

Route::middleware(['auth:sanctum', 'verified'])->post('/clients/create', [
    ClientsController::class, 
    'store'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/clients/edit/{id}', [
    ClientsController::class, 
    'edit'
]);

Route::middleware(['auth:sanctum', 'verified'])->put('/clients/edit/{id}', [
    ClientsController::class, 
    'update'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/clients/delete/{id}', [
    ClientsController::class, 
    'delete'
]);

Route::middleware(['auth:sanctum', 'verified'])->delete('/clients/delete/{id}', [
    ClientsController::class, 
    'destroy'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/github', [
    GitHubController::class, 
    'index'
])->name('github.index');
