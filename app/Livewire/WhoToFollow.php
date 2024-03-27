<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
class WhoToFollow extends Component
{
   public   $user ;
    public function toggleFollow(User $user){
        if(Auth::user()->follow->contains('user_follower' , $user->id)){
            Auth::user()->follow()->where('user_follower' , $user->id)->delete();
        }else{
            Auth::user()->follow()->create(['user_follower' => $user->id]);
        }
    }
    public function render(){
        $me = Auth::user()->id;

        $users = User::where('id' , '!=' , $me)
            ->whereNotIn('id', function ($q) use ($me) {$q->select('user_follower')->from('follows')->where('user_follow', $me);})
            ->whereNotIn('id', function ($q) use ($me) {$q->select('user_follow')->from('follows')->where('user_follower', $me);})
            ->whereIn('id', function ($q) use ($me) {$q->select('user_follow')->from('follows')->whereIn('user_follower', function ($innerQ) use ($me) {$innerQ->select('user_follower')->from('follows')->where('user_follow', $me);});})
            ->orWhereIn('id', function ($q) use ($me) {$q->select('user_follow')->from('follows')->whereIn('user_follower', function ($innerQ) use ($me) {$innerQ->select('user_follow')->from('follows')->where('user_follower', $me);});})
            ->where('id' , '!=' , $me)
            ->whereNotIn('id', function ($q) use ($me) {$q->select('user_follower')->from('follows')->where('user_follow', $me);})
            ->whereNotIn('id', function ($q) use ($me) {$q->select('user_follow')->from('follows')->where('user_follower', $me);})
            ->latest()->take(5)->get();

        if($users->count() < 5){
            $newUsers = User::where('id' , '!=' , $me)->whereNotIn('id', function ($q) use ($me) {$q->select('user_follower')->from('follows')->where('user_follow', $me);})
            ->whereNotIn('id', function ($q) use ($me) {$q->select('user_follow')->from('follows')->where('user_follower', $me);})->latest()->take(5 - $users->count())->get();
            return view('livewire.who-to-follow' , ['users' => $users , 'newUsers' => $newUsers]);

        }
        
        $newUsers = [] ;
        return view('livewire.who-to-follow' , ['users' => $users  ,'newUsers' => $newUsers]);
    }
}
