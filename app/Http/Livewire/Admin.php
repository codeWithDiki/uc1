<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Beli;
use App\Models\User;

class Admin extends Component
{
	public $posts;
	public $beli;
	public $users;
    public function render()
    {
    	$this->posts = Post::all();
    	$this->beli = Beli::all();
    	$this->users = User::all();
        return view('livewire.admin');
    }

    public function followUp($arg, $id){
    	switch ($arg) {
    		case 'proses':
    			Beli::where('id',$id)->update([
		    			'status' => 'diproses'
		    		]
		    	);
    			break;
    		case 'selesaikan':
    			Beli::where('id',$id)->update([
		    			'status' => 'selesai'
		    		]
		    	);
    			break;
    	}

    	return redirect('/admin');
    }
}
