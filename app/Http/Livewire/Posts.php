<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Beli;

class Posts extends Component
{	
	public $posts;
	public $beli;
	public $isOpen = 0;

    public function render()
    {
    	$this->posts = Post::all();
    	$this->beli = Beli::all();

        return view('livewire.posts');
    }

    public function beliProduk($id, $id_pembeli){
    	$this->isOpen = 1;
    	Beli::Create([
    			'id_produk' => $id,
    			'id_pembeli' => $id_pembeli
    		]
    	);
    	return redirect('/client');
    }

    public function batalProduk($id, $id_p){
    	Beli::where('id', $id)
    	->where('id_pembeli', $id_p)
    	->delete();
    	redirect('/client');
    }

    public function pushCS($id, $id_p){
    	Beli::where('id', $id)
    	->where('id_pembeli', $id_p)
    	->update([
    		'status' => 'pending'
    	]);
    	redirect('/client');
    }
}
