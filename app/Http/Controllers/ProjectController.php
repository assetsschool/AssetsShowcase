<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreate;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * This is the project creation page. This is the controller index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createView() // change me
    {
        // Returns the
        return view('profile', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the requested user profile.
     * @param string $email
     * @param string $title
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view(string $email, string $title)
    {

        // Replaces the title's -'s with spaces
        $parsedProjectTitle = str_replace('-', ' ', $title);
        // Uppercases the first letter of each word.
        $parsedProjectTitle = ucwords(strtolower($parsedProjectTitle));

        // Tries to query the user based on the email.
        $user = \App\User::where('email', $email)->first();

        // Tries to find the project.
        $project = $user->projects()->where('title', $parsedProjectTitle)->first();

        // Checks if the user was found
        if ($user) {
            if ($project) {
                return view('project', [
                    'project' => $project
                ]);
            } else {
                // Redirects back to the home page, with an error message.
                return redirect(route('home'))->withError('That project could not be found.');
            }
        } else {
            // Redirects back to the home page, with an error message.
            return redirect(route('home'))->withError('That user could not be found.');
        }
    }

    /**
     * Show the requested user profile.
     * @param ProjectCreate $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(ProjectCreate $request) {

        // Retrives the validated data from the request
        $validated = $request->validated();

        $user = Auth::user();

        // Edits the title and description for unnesisarry whitespaces
        $validated['title'] = preg_replace(['/\s{2,}/', '/[\t\n]/'], ' ', $validated['title']);
        $validated['description'] = preg_replace(['/\s{2,}/', '/[\t\n]/'], ' ', $validated['description']);

        // Checks if the user already has an project with that name.
        $existingProject = $user()->projects()->where('title', $validated['title']);
        if ($existingProject) {
            return redirect()->back()->withError('You already have a project with that title.')->withInput();
        }

        // Creates a new project for the user
        $project = new \App\Project([
            'user_id' => $user->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
        ]);
        // Saves the project
        $project->save();

        // Responds with the user's project, along with a success message.
        return redirect(route('project', [
            'email' => $user->email,
            'title' => str_replace(' ', '-', strtolower( $project->title )), // Turns pretty title into URL friendly title.
        ]))->withSuccess( $project->title . ' has been created!' );

    }
}
