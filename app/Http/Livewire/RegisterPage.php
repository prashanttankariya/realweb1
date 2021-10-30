<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class RegisterPage extends Component
{

    use AuthenticatesUsers;

    //intialize array and variable
    public $form = [

        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',

    ];
    
    public function render()
    {
        return view('livewire.register-page');
    }

    
    public function registerUser(Request $request)
    {
        
        $this->validate([
            'form.name' => ['required','min:3','max:25'],
            'form.email' => ['required','email','unique:users,email'],
            'form.password' => ['required','min:6','max:15'],
            'form.password_confirmation' => ['required','same:form.password']
        ]);    


        //add to DB
        User::create($this->form);
        // $createUser = User::create([
        //     'name' => $this->form.name,
        //     'email' => $this->form.email,
        //     'password' => $this->form.password
        //     //'password_confirmation'=> $this->password_confirmation
        // ]);

        return redirect(route('login'));

    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'form.name' => 'required|min:3|max:25',
            'form.email' => 'required|email|unique:users,email',
            'form.password' => 'required|min:6|max:15',
            'form.password_confirmation' => 'required|same:form.password'
        ]);
    }



}//register page ends
