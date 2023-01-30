<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $feed = Post::withCount('likes')->latest()->paginate(10);

        return view('home', ['feed' => $feed]);

    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 2 Guest, step 5 and 6.
        | You should implement this method as instructed
        |-----------------------------------------------------------------------
        */

        request()->validate([
            'name' => ['required', 'string', 'max:35'],
            'email' => ['required'],
            'password' => ['required', 'same:password-confirmation'],
            'password-confirmation' => ['required']
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route("home");

    }

    public function doLogin(Request $request)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 3 Guest, step 4.
        | You should implement this method as instructed
        |-----------------------------------------------------------------------
        */

        request()->validate([
            'email' => ['required', 'exists:users,email'],
            'password' => ['required']
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route("home");
        }

        return back()->withErrors([
            'error' => 'Incorrect email or password',
        ]);

    }

    public function logOut()
    {
        /*
        |-----------------------------------------------------------------------
        | Task 2 User, step 3.
        | You should implement this method as instructed
        |-----------------------------------------------------------------------
        */

        Auth::logout();

        return redirect()->route("home");

    }
}
