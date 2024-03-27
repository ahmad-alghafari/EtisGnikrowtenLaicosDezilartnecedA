<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\share;
use Illuminate\Support\Facades\Auth;


class Sharelive extends Component
{
    public $post ;
    public $isshared;
    public function mount($post){
        $this->post = $post;
        $this->isshared = share::where('post_id',$this->post->id)->where('user_id',Auth::user()->id)->exists();
    }

    public function shareing(){
        if($this->isshared){
            Auth::user()->share()->where('post_id',$this->post->id)->delete();
            $this->post->decrement('share_number');
            auth::user()->info->decrement('posts_number');
            $this->isshared = false ;
        }else{
            Auth::user()->share()->create(['post_id' => $this->post->id]);
            $this->post->increment('share_number');
            auth::user()->info->increment('posts_number');
            $this->isshared = true ;
        }
        $this->post = $this->post->fresh();
    }
    public function render()
    {
        return view('livewire.sharelive');
    }
}
