<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'get']);
    }

    public function show() {
        $user = User::findorfail(1);
        return view('private.profile.show', [
            'user' => $user,
        ]);
    }

    public function edit() {
        $user = User::findorfail(1);
        return view('private.profile.edit', [
            'user' => $user,
        ]);
    }

    public function update()
    {
        
        $user = User::findorfail(1);
        
        $profileData = request()->validate([
            'description' => 'required',
            'image' => 'image',
        ]);

        $imagePath = $user->profile->image;
        if(request('image')) {

            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->resize(1000, 1000);//->fit(1000,1000);
            $image->save();
        }

        //merge prev array with array containing new data
        auth()->user()->profile->update(array_merge(
            $profileData,
            ['image' => $imagePath]
        ));

        return redirect("/staffprofile");
    }

    public function updateImage() {
        $user = User::findorfail(1);
        $profile = Profile::findorfail(1);
        File::delete( public_path('/storage/' . $profile->image));
        $fileData = request()->validate([
            'image' => ['required','image']
        ]);
        $imagePath = request('image')->store('profile', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(1000, 1000);
        $image->save();
        $user->profile()->update(['image' => $imagePath]);
        return $imagePath;
    }

    public function updateText() {
        $user = User::findorfail(1);
        $fileData = request()->validate([
            'desc' => 'required'
        ]);
        $user->profile()->update(['description' => $fileData['desc']]);
        return "Profile Description updated";
    }

    public function get() {
        $user = User::find(1);

        return response()->json($user->profile);
    }

    public function destroy() {
        $user = User::find(1);
        $profile = Profile::findorfail(1);
        File::delete( public_path('/storage/' . $profile->image));
        $user->profile()->update(['image' => 'default.png']);

        return ['message' => 'Profile Image deleted successfully'];
    }
}