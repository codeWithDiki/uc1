<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Beli;

class Posts extends Component
{	
	public $posts;
	public $isOpen = 0;

    public function render()
    {
    	$this->posts = Post::all();
        return view('livewire.posts');
    }

    public function beliProduk($id, $id_pembeli){
    	$this->isOpen = 1;
    	Beli::UpdateOrCreate([
    			'id_produk' => $id,
    			'id_pembeli' => $id_pembeli
    		]
    	);
    	redirect(view('livewire.posts'));
    }

    public function closeModal(){
    	$this->isOpen = 0;
    }
}
