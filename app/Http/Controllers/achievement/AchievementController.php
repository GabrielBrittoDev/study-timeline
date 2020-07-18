<?php

namespace App\Http\Controllers\achievement;

use App\achievement\Achievement;
use App\Http\Requests\achievement\AchievementStoreRequest;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    private  $achievement;

    public function __construct(Achievement $achievement)
    {
        $this->achievement = $achievement;
    }


    public function store(AchievementStoreRequest $request){
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        return $this->achievement->create($validated);
    }

    public function update($request){


    }

    public function destroy(int $id){

    }

    public function show(int $id){

    }
}
