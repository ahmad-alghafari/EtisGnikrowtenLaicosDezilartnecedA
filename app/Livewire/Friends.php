<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Friends extends Component
{
    public function unfollow(User $user){
        Auth::user()->follow()->where('user_follower' , $user->id)->delete();
    }
    public function render()
    {
        $friends = Auth::user()->follow()->inRandomOrder()->take(4)->get();
        // $friends = Auth::user()->follow()->take(4)->get();

        
        return view('livewire.friends' , ['friends' => $friends]);
    }
}
