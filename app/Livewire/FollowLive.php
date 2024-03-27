<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\follow;

class FollowLive extends Component{
    public $user;
    public $isFollow ; 
    public function mount($user){
        $this->user = $user ;
        $this->isFollow = Auth::user()->follow()->where('user_follower',$this->user->id)->exists();
    }
    public function toggleFollow() :void{
        if($this->isFollow){
            Auth::user()->follow()->where('user_follower' , $this->user->id)->delete();
            Auth::user()->info->decrement('following');
            $this->user->info->decrement('follower');
            $this->isFollow = false ;
        }else{
            Auth::user()->follow()->create(['user_follower' => $this->user->id]);
            Auth::user()->info->increment('following');
            // Auth::user()->info->increment("following");
            $this->user->info->increment('follower');
            $this->isFollow = true ;
        }
        $this->user = $this->user->fresh() ;
    }
    public function render()
    {
        return view('livewire.follow-live');
    }
}
