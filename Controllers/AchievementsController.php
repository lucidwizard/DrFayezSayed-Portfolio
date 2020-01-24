<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achievements;

class AchievementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'get']);
    }
    
    public function show() {
        return view('private.achievements.show');
    }

    public function get() {
        $achievements = Achievements::orderBy('order','asc')->get();
        return response()->json($achievements);
    }

    public function store(Request $request) {

        $data = request()->validate([
            'mainTitle' => 'required',
            'secondaryTitle' => '',
            'subject' => '',
            'location' => '',
            'date' => '',
            'order' => '',
            'desc' => ''
        ]);
        
        Achievements::create([
            'mainTitle' => $data['mainTitle'],
            'secondaryTitle' => $data['secondaryTitle'],
            'subject' => $data['subject'],
            'location' => $data['location'],
            'date' => $data['date'],
            'order' => $data['order'],
            'desc' => $data['desc'],
            'user_id' => 1
        ]);

        return ['message' => 'Storing your new data'];
    }

    public function update(Request $request) {
        $data = request();
        $id = $data['id'];
        
        $achievementData = request()->validate([
           'mainTitle' => 'required',
           'secondaryTitle' => '',
           'subject' => '',
           'location' => '',
           'date' => '',
           'order' => '',
           'desc' => ''
        ]);

        $achievement = Achievements::find($id);

        $achievement->mainTitle = $achievementData['mainTitle'];
        $achievement->secondaryTitle = $achievementData['secondaryTitle'];
        $achievement->subject = $achievementData['subject'];
        $achievement->location = $achievementData['location'];
        $achievement->date = $achievementData['date'];
        $achievement->order = $achievementData['order'];
        $achievement->desc = $achievementData['desc'];
        $achievement->save();

        
        return ['message' => 'db updated.'];
    }

    public function destroy($id) {
        $ach = Achievements::find($id);
        $ach->delete();

        return ['message' => 'Achievement deleted successfully'];
    }
}
