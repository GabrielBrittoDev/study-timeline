<?php

namespace App\Http\Controllers\achievement;

use App\achievement\Achievement;
use App\Http\Controllers\Controller;
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

        $achievement = $this->achievement->create($validated);

        return response()->json(compact('achievement'), 201);
    }

    public function update(AchievementStoreRequest $request, int $id){
        $achievement = $this->achievement->findOrFail($id);
        $validated = $request->validated();

        $achievement->user_id = auth()->user()->id;
        $achievement->update($validated);

        return response()->json(['achievement' => $achievement], 200);
    }

    public function destroy(int $id){
        $achievement = $this->achievement->findOrFail($id);

        if ($achievement->delete()){
            return response()->json(['message' => 'Realização excluida'], 200);
        }
    }

    public function show(int $id){

    }
}
