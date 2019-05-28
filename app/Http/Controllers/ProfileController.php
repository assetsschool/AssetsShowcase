<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Returns the
        return view('profile', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the requested user profile.
     * @param email
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view(string $email)
    {

        // Tries to query the user based on the email, along with the profile object
        $user = App\User::where('email', $email)->with('profile')->first();

        // Checks if the user was found
        if ($user) {
            // Return the view if the user can be found.
            return view('profile', [
                'user' => $user,
            ]);
        } else {
            // Returns a blank view and an error.
            return view('profile');
        }
    }

}
