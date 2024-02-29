<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    $users = $request->user();
    $user = User::with('roles')->get();

    // dump($users->can('edit-post'));
    // dump($users->can('delete-post'));
    // dump($users->can('show-post'));
    // dump($users->givePermissionTo(['edit-post','delete-post'] ));
    // dump($users->updatePermissionTo(['delete-post']));
    // dump($users->withdrawPermissionTo(['edit-post'] ));

    // return  new \Illuminate\Http\Response('Hello World', 200);

    return view('dashboard', compact('users', 'user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'role:admin'], function() {

    Route::get('/admin', function (\Illuminate\Http\Request $request) {
        $users = $request->user();
        $user = User::with('roles')->get();
        return view('dashboard', compact('users', 'user'));
    });
});












Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
