<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\CartItem;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = $request->user();

        // Check if the email has changed
        if ($user->email !== $validated['email']) {
            // Update the email
            $user->email = $validated['email'];

            // Invalidate current email verification status
            $user->email_verified_at = null;
            
            // Send email verification notification
            $user->sendEmailVerificationNotification();
        }

        // Update other profile information
        $user->username = $validated['username'];
        $user->save();

        // Call the authenticated method
        $this->authenticated($request, $user);

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Handle post-authentication logic.
     */
    protected function authenticated(Request $request, $user)
    {
        $sessionCart = session()->get('cart', []);
        foreach ($sessionCart as $ticketId => $item) {
            CartItem::updateOrCreate(
                ['user_id' => $user->id, 'ticket_id' => $ticketId],
                [
                    'username' => $user->name,
                    'ticket_type' => $item['ticket_type'],
                    'quantity' => \DB::raw('quantity + ' . $item['quantity'])
                ]
            );
        }
        session()->forget('cart');
    }
    
}