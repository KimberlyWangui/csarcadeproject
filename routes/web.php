<?php
use App\Http\Controllers\TicketCartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\GameSectionController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

Route::get('/buy-tickets', [TicketController::class, 'buyTickets'])->name('buy.tickets');



Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

// Route for displaying games (dispgames.blade.php)
Route::get('/dispgames', [GameController::class, 'dispGames'])->name('games.dispGames');

Route::middleware('auth')->group(function () {
    Route::get('/game-cart', [CartController::class, 'showGameCartTable'])->name('game.cart.show');
    Route::post('/game-cart/add/{id}', [CartController::class, 'addGameToCart'])->name('game.cart.add');
    Route::post('/game-cart/remove', [CartController::class, 'removeGameCartItem'])->name('game.cart.remove');
    Route::post('/game-cart/clear', [CartController::class, 'clearGameCart'])->name('game.cart.clear');
    Route::get('/games-for-cart', [CartController::class, 'showGamesForCart'])->name('games.for.cart');
});


// Route for the admin page
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/role-register', [DashboardController::class, 'registered']);
    Route::get('admin/role-edit/{userid}', [DashboardController::class, 'registeredit'])->name('admin.register-edit');
    Route::put('admin/role-register-update/{userid}', [DashboardController::class, 'registerupdate']);
    Route::delete('admin/role-delete/{userid}', [DashboardController::class, 'registerdelete']);

    Route::get('admin/games', [GameSectionController::class, 'index']);
    Route::post('admin/save-games', [GameSectionController::class, 'store']);
    Route::get('admin/edit-games/{game_id}', [GameSectionController::class, 'edit']);
    Route::put('admin/game-edit/{game_id}', [GameSectionController::class, 'update']);
    Route::delete('admin/game-delete/{game_id}', [GameSectionController::class, 'delete']);
});

//Route for the admin page
//Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth','admin'])->name('admin.dashboard');

//Route for the admin page
Route::group(['middleware' => ['auth', 'admin']], function () {
   Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
   Route::get('admin/role-register', [DashboardController::class, 'registered']);
   //Route::get('admin/role-edit/{userid}', [DashboardController::class, 'registeredit']);//
   Route::get('admin/role-edit/{userid}', [DashboardController::class, 'registeredit'])->name('admin.register-edit');
   Route::put('admin/role-register-update/{userid}', [DashboardController::class, 'registerupdate']);
   Route::delete('admin/role-delete/{userid}', [DashboardController::class, 'registerdelete']);

   Route::get('admin/games', [GameSectionController::class, 'index']);
   Route::post('admin/save-games', [GameSectionController::class, 'store']);
   Route::get('admin/edit-games/{game_id}', [GameSectionController::class, 'edit']);
   Route::put('admin/game-edit/{game_id}', [GameSectionController::class, 'update']);
   Route::delete('admin/game-delete/{game_id}', [GameSectionController::class, 'delete']);

});
Route::get('/tickets', [TicketCartController::class, 'showTickets'])->name('tickets.list');
Route::get('/cart', [TicketCartController::class, 'showCartTable'])->name('cart.show');
Route::post('/cart/add/{id}', [TicketCartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [TicketCartController::class, 'removeCartItem'])->name('cart.remove');
Route::post('/cart/clear', [TicketCartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/update', [TicketCartController::class, 'updateQuantity'])->name('cart.update');

