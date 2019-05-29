<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdate;

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
            'me' => true,
        ]);
    }

    /**
     * Show the requested user profile.
     * @param string $email
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view(string $email)
    {

        // Tries to query the user based on the email, along with the profile object
        $user = \App\User::where('email', $email)->with(['profile'])->first();

        // Checks if the user was found
        if ($user) {
            // Return the view if the user can be found.
            return view('profile', [
                'user' => $user,
            ]);
        } else {
            // Returns a blank view and an error. Redirects them back after 4 seconds.
            return response()->view('profile')->header("Refresh", "5;url=/home");
        }
    }

    /**
     * Show the requested user profile.
     * @param ProfileUpdate $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(ProfileUpdate $request)
    {

        // Retrieves the validated data.
        $validated = $request->validated();

        // Check if the user has a profile.
        $user = Auth::user();
        $profile = $user->profile()->first();

        // Create a profile for the user, if one does not already exist.
        if (!$profile) {
            $profile = new \App\Profile([
                'user_id' => $user->id,
                'class_of' => date('Y') + 4,
            ]);
            $profile->save();
        }

        // Process and save the image, if it exists.
        if (isset($validated['photo'])) {
            // Save through the file controller
        }
        // Save the biography, if it exists.
        if (isset($validated['biography'])) {
            $profile->biography = $validated['biography'];
        }

        // Saves the profile
        $profile->save();

        // Return, and redirect back to the GET page.
        return redirect()->back()->withSuccess('Your profile has been updated!');
    }

}
