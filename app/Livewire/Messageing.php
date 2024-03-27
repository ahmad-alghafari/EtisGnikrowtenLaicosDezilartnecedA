<?php

namespace App\Livewire;

use App\Events\Messaging;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ChMessage;

class Messageing extends Component
{
    public $search = '' ;
    public $message = '' ;
    public $reciver;
    public $messageToSend = '' ;
    public $me ;

    public function Receiver($reciver_id){
        $this->reciver = User::find($reciver_id) ;
    }

    public function sendMessage(){
        $this->validate([
            'messageToSend' => 'required' 
        ]);
        ChMessage::create([
            'from_id' => $this->me->id ,
            'to_id' => $this->reciver->id ,
            'body' => $this->messageToSend ,
        ]);
        \broadcast(new Messaging($this->reciver ,$this->messageToSend));
        $this->messageToSend = '' ;
    }

    public function deleteChat()  {
        
    }

    public function render(){
        $this->me = Auth::user();
        if($this->reciver != null){
            $this->message = ChMessage::where('from_id' ,$this->me->id)->where('to_id', $this->reciver->id)->orWhere('from_id' ,$this->reciver->id)->where('to_id', $this->me->id)->orderBy('created_at', 'asc')->get();  
            $this->message = $this->message->fresh();
        }
        
        if($this->search == ''){
            $userid = $this->me->id ;
            $users = User::whereNotIn('id', function ($query) use ($userid) {
                $query->select('user_blocker')
                    ->from('blocks')
                    ->where('user_blocked', $userid);
                })->whereIn('id', function ($query) use ($userid) {
                    $query->select('user_follower')
                        ->from('follows')
                    ->where('user_follow', $userid);
                })->take(10)->get(['id' , 'name' , 'email']);
        }else{
            $users = User::where('name', 'like', '%' . $this->search . '%')->take(10)->get(['id', 'name', 'email']);
        }

        return view('livewire.messageing',compact('users') );
        // if($this->reciver != null){
        //     return view('livewire.messageing', [
        //         'users' => $users ,
        //         'path' => $this->reciver->photo->path ,
        //     ]);
        // }else{
        //     return view('livewire.messageing', [
        //         'users' => $users ,
        //         'path' => 'placeholder' ,
        //     ]);
        // }
        
    }
}
