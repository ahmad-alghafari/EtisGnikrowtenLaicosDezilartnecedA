<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\commentlike;
class LikeCommentLive extends Component
{
    public $comment ;
    public $isliked ;
    public function mount($comment )
    {
        $this->comment = $comment;
        $this->isliked = Auth::user()->commentlike()->where('comment_id',$comment->id)->exists();
    }

    public function toggleLike(): void
    {
        if($this->isliked){
            Auth::user()->commentlike()->where('comment_id',$this->comment->id)->delete();
            $this->comment->decrement("likes_number");
            $this->isliked = false ;
        }else{
            Auth::user()->commentlike()->create([ 'comment_id' => $this->comment->id]);
            $this->comment->increment("likes_number");
            $this->isliked = true ;
        }
        $this->comment = $this->comment->fresh();
        // $this->isliked = $this->isliked->fresh();

    }
    public function render()
    {
        return view('livewire.like-comment-live' );
    }
}
