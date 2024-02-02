<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArranchamentoController;

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

// Redirecionar a rota raiz para a tela de login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'assignRolesAndPermissions'])->name('profile.destroy');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/arranchamentos', [ArranchamentoController::class, 'index'])->name('arranchamentos.index');
    Route::post('/arranchamentos', [ArranchamentoController::class, 'store'])->name('arranchamentos.store');
    Route::post('/arranchamentos/update/{id}', [ArranchamentoController::class, 'updateStatus'])->name('arranchamentos.updateStatus');  
    
    Route::middleware(['role:admin'])->group(function(){
        Route::get('/arranchamentos/dashboard', [ArranchamentoController::class, 'dashboard'])->name('arranchamentos.dashboard');
    });
});




require __DIR__.'/auth.php';
