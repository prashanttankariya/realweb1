<?php

namespace App\Http\Livewire;

use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Comment;
use App\Events\messageEvent;

class CommentPage extends Component
{
    public $commentBox;
    public $authUser;
    public $records;
    //public $allComments = [];
    //grab the comments from DB
    
    //event listeners
    //protected $listeners = ['postAdded'];
    //protected $listeners = ['echo:messageChannel,messageEvent' => 'sendRecords'];
    public function getListeners()
    {
        return [
            "echo-private:messageChannel,messageEvent" => 'render',
            // Or:
            //"echo-presence:orders.{$this->orderId},OrderShipped" => 'notifyNewOrder',
        ];
    }


    public function mount()
    {
        if(Auth::check()){
            $this->authUser = Auth::user()->name;
        }
        else{
            $this->authUser = "Unauthenticated";
        }
        
        //$this->allComments = Comment::latest()->get();
            
    }

    public function render()
    {
        
        
        $allComments = Comment::latest()->get();
        return view('livewire.comment-page',compact('allComments',$allComments));
        //return view('livewire.comment-page');
    }




    //add comment Method
    public function addComment()
    {
        //prevent if not logged in
        if (!Auth::check()) {
            
                session()->flash('unauth','Unauthenticated. Please Login to comment.');

        }
        else{

            //if logged in check input
            $this->validate([

                    'commentBox' => 'required|min:3|max:300'
            ]);    
            
            //if everything is okay add to database
            $addCommentToDB = Comment::create([
                'title' => $this->commentBox,
                'user_id' => Auth::user()->id
            ]);

            if($addCommentToDB){

                //fire an event 
                //event(new messageEvent('new msg.'));

                $this->commentBox = '';
                session()->flash('success','Success! Comment Added.');
            }
        }

        

    }// add comment ends

    public function updated($field)
    {
        $this->validateOnly($field, [
            'commentBox' => 'required|min:3|max:300'
        ]);
    }


    //remove comment
    public function removeComment($id)
    {
            if(Auth::check()){
                $findComment = Comment::find($id);
                $delComment = $findComment->delete();
            
                if($delComment){

                    session()->flash('removed','Success! Removed Comment.');
                }
            }
                else{

                        session()->flash('error','Please Login to Remove Comment.');

                }
            
            
    }

    public function sendRecords()
    {
        $this->records = "New message will popup!";
        $this->commentsFromDB = Comment::latest()->get();
    }
    
    public function check()
    {
        alert('Hello');
    }

} // main class ends
