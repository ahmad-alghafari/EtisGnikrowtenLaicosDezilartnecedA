<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\post;
class Search extends Component
{
    public $search = '';

    public function toggleFollow(User $user) :void{
        if(Auth::user()->follow->contains('user_follower' , $user->id)){
            Auth::user()->follow()->where('user_follower' , $user->id)->delete();
            Auth::user()->info->decrement('following');
            $user->info->decrement('follower');
        }else{
            Auth::user()->follow()->create(['user_follower' => $user->id]);
            Auth::user()->info->increment('following');
            $user->info->increment('follower');
        }

    }
    public function render(){
        $userid = Auth::user()->id ;

        $posts = Post::whereNotIn('user_id', function ($query) use ($userid) {
            $query->select('user_blocker')
                ->from('blocks')
                ->where('user_blocked', $userid);
        })->where('text' , 'like' , '%'.$this->search.'%')->latest()->take(20)->get();

        $users = User::where('id', '!=', $userid)
            ->where('name', 'like' , '%'.$this->search.'%')
            ->whereNotIn('id', function ($query) use ($userid) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', $userid);
            })->latest()->take(20)->get();
//        $this->search = '';
        return view('livewire.search'  , ['posts' => $posts , 'users'=> $users]);
    }
}
