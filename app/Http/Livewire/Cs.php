<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Beli;
use App\Models\User;

class Cs extends Component
{
	public $posts;
	public $beli;
	public $users;
	public $test;
    public function render()
    {
    	$this->posts = Post::all();
    	$this->beli = Beli::all();
    	$this->users = User::all();
    	$this->test = Beli::findOrFail('1');

        return view('livewire.cs');
    }

    public function followUp($id){
    	$invoice = Beli::find($id);
    	
	    	$produk = Post::find($invoice->id_produk);
	    	$user = User::find($invoice->id_pembeli);
	    	$msg = urlencode("Mohon untuk segera diproses invoice id : ".$invoice->id." \nDetail:\nID Produk : ".$produk->id."\nNama Produk : ".$produk->nama_produk."\nHarga : ".$produk->harga."\nPembeli : ".$user->name);
	    	$nomor_admin = "";

	    	foreach ($this->users as $key => $value) {
	    		if($value["akses"] == "admin"){
	    			$nomor_admin ='62'.substr($value['nomor_handphone'],1);
	    		}
	    	}

	    	redirect('https://api.whatsapp.com/send?phone='.$nomor_admin.'&text='.$msg);
	    
    }
}
