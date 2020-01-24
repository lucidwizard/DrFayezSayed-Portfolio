<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\WorkExperience;

class WorkExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'get']);
    }

    public function index() {
        $we = WorkExperience::all();
    }

    public function show() {
        $user = User::findorfail(1);
        return view('private.workExperience.show', [
            'user' => $user,
        ]);
    }

    public function get()
    {
        $exp = WorkExperience::orderBy('created_at','desc')->get();
        return response()->json($exp);
    }

    public function store(Request $request) {
        $data = request();
        $data = request()->validate([
            'title' => 'required',
            'dates' => 'required',
            'company' => 'required',
            'desc' => '',
            'user_id' => 'required'
        ]);
        WorkExperience::create([
            'title' => $data['title'],
            'dates' => $data['dates'],
            'company' => $data['company'],
            'desc' => $data['desc'],
            'user_id' => $data['user_id'],
        ]);

        return ['message' => 'Storing your new data'];
    }

    public function update(Request $request) {
        $data = request();
        $exp_id = $data['exp_id'];
        $experience = WorkExperience::find($exp_id);

        $expData = request()->validate([
           'title' => 'required',
           'dates' => 'required',
           'company' => 'required',
           'desc' => 'required',
        ]);

        $experience->title = $expData['title'];
        $experience->dates = $expData['dates'];
        $experience->company = $expData['company'];
        $experience->desc = $expData['desc'];
        $experience->save();

        return ['message' => 'I have your data. check your db'];
    }

    public function destroy($workExp_id) {
        
        $exp = WorkExperience::find($workExp_id);
        $exp->delete();

        return ['message' => 'Experience deleted successfully'];
    }
}
