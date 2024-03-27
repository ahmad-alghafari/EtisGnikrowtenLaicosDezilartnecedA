<?php

namespace App\Livewire;

use App\Models\file;
use Livewire\Component;

class Unfollow extends Component
{
    public $user;
    public function mount($user){
        $this->user = $user ;
    }

    public function unfollow(){
        Auth::user()->follow()->where('user_follower' ,$this->user)->delete();
    }
    public function render()
    {

        return view('livewire.unfollow');
    }
}
