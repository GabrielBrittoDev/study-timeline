<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function show(User $user){
        $achievements = $user->achievements()->orderBy('date')->get();
        return view('user/user_timeline')->with(compact('achievements', 'user'));
    }
}
