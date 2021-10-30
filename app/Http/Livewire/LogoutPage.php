<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;    
use App\User;

class LogoutPage extends Component
{

    public function logout()
    {
        Auth::logout(); 
        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.logout-page');
    }
}
