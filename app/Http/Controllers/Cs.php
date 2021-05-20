<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cs extends Controller
{
    public function render()
    {
    	$this->posts = Post::all();
    	$this->beli = Beli::all();

        return view('livewire.cs');
    }
}
