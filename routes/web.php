<?php
use App\Http\Controllers\TicketCartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\GameSectionController;
use App\Http\Controllers\Admin\TicketSectionController;
use App\Http\Controllers\Admin\PromotionsSectionController;
use App\Http\Controllers\Admin\BookingController;
use App\Models\User;
use App\Models\Booking;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/FAQ', function () {
    return view('FAQ');
})->name('FAQ');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $user = Auth::user();
    $bookings = $user->bookings; // Retrieve user's bookings

    return view('dashboard', compact('user', 'bookings'));
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

   Route::get('admin/tickets', [TicketSectionController::class, 'index']);
   Route::post('admin/save-tickets', [TicketSectionController::class, 'store']);
   Route::get('admin/edit-tickets/{id}', [TicketSectionController::class, 'edit']);
   Route::put('admin/ticket-update/{id}', [TicketSectionController::class, 'update']);
   Route::delete('admin/ticket-delete/{id}', [TicketSectionController::class, 'delete']);

   Route::get('admin/promotion', [PromotionsSectionController::class, 'index']);
   Route::post('admin/save-promotion', [PromotionsSectionController::class, 'store']);
   Route::get('admin/edit-promotion/{id}', [PromotionsSectionController::class, 'edit']);
   Route::put('admin/promotion-update/{id}', [PromotionsSectionController::class, 'update']);
   Route::delete('admin/promotion-delete/{id}', [PromotionsSectionController::class, 'delete']);

   Route::get('admin/bookings', [BookingController::class, 'index']);
   Route::get('admin/edit-booking/{id}', [BookingController::class, 'edit']);
   Route::put('admin/booking-update/{id}', [BookingController::class, 'update']);
  
});


Route::get('/tickets', [TicketCartController::class, 'showTickets'])->name('tickets.list');

Route::prefix('cart')->group(function () {
    Route::get('/', [TicketCartController::class, 'showCartTable'])->name('cart.show');
    Route::post('/add/{id}', [TicketCartController::class, 'addToCart'])->name('cart.add');
    Route::post('/remove', [TicketCartController::class, 'removeCartItem'])->name('cart.remove');
    Route::post('/clear', [TicketCartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/update', [TicketCartController::class, 'updateQuantity'])->name('cart.update');
    Route::get('/show-checkout', [TicketCartController::class, 'showCheckout'])->name('cart.checkout');
    Route::get('/checkout', [TicketCartController::class, 'checkout'])->name('checkout');
    Route::post('/process-payment', [TicketCartController::class, 'processPayment'])->name('cart.process-payment');
  
Route::get('/payment-waiting', [TicketCartController::class, 'waitForPayment'])->name('payment.waiting');
Route::post('/confirm-payment', [TicketCartController::class, 'confirmPayment'])->name('payment.confirm');
Route::get('/check-status', [TicketCartController::class, 'checkPaymentStatus'])->name('payment.check-status');
Route::get('/payment/success', [TicketCartController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/failed', [TicketCartController::class, 'paymentFailed'])->name('payment.failed');

});

// routes/web.php
Route::post('/apply-promo-code', [TicketCartController::class, 'applyPromoCode'])->name('cart.apply-promo');





Route::get('/another-page', [CartController::class, 'anotherPage'])->name('another.page');

