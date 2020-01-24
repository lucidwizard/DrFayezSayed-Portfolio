<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->User();
        return view('private.home', compact('user'));
    }

    public function show() {
        return view('private.user.show');
    }

    public function get() {
        $user = User::find(1);
        return response()->json($user);
    }

    public function update() {
        $user = User::findorfail(1);
        $fileData = request()->validate([
            'foo' => 'required'
        ]);
        $pw = bcrypt($fileData['foo']);
        $user->update(['password' => $pw]);
        return "Foo updated";
    }
}
