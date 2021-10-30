<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginPage extends Component
{

    public $form = [
        'email' => '',
        'password' => '',
    ];

    public function render()
    {
        return view('livewire.login-page');
    }


    public function loginUser()
    {
        $this->validate([
            'form.email' => 'required|email',
            'form.password'  => 'required|min:6|max:15'
        ]);

        $check = Auth::attempt($this->form);
        
        if($check){
            return redirect(route('dashboard'));        
        }
        else{
             
                session()->flash('error','Invalid Credentials.');
            
        }
        
    }


    public function updated($field)
    {
        $this->validateOnly($field, [
            'form.email' => 'required|email',
            'form.password'  => 'required|min:6|max:15'
        ]);
    }
    

    public function check()
    {
            alert('Hello');
    }


}//main class ends
