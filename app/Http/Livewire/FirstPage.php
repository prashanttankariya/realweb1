<?php

namespace App\Http\Livewire;

use Sarfraznawaz2005\SSE\Facades\SSEFacade;
use Livewire\Component;

class FirstPage extends Component
{
    
    public function render()
    {
        return view('livewire.first-page');
    }

    public function mount()
    {
        //SSEFacade::notify('hello world....', 'info', 'message');
    }



}
