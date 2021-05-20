<body class="antialiased font-sans bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                	<h1 class="px-5 py-3 border-b-2 border-gray-200 bg-white-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Log Pembelian</h1>
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID Order
                                </th>

                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Pembeli
                                </th>

                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Produk
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($beli as $key => $value)
                        	
                        		@foreach($posts as $k =>$v)
                        		@if($value['id_produk'] == $v['id'] && $value['status'] !='requested')
	                        	<tr>
	                        		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$value['id']}}</td>

	                        		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
	                        			@foreach($users as $m => $n)
		                        			@if($value['id_pembeli'] == $n['id'])

		                        				{{$n['name']}}
		                        			
		                        			@endif

	                        			@endforeach
	                        		</td>

	                        		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
	                        		{{$v['nama_produk']}}
	                        		</td>

	                        		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$v['harga']}}</td>

	                        		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$value['status']}}</td>

	                        		<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
	                        		@if($value['status'] == "pending")
	                        		<button wire:click="followUp({{$value['id']}})" class="bg-green-500 hoverL:bg-green-700 text-white font-bold py-1 px-1 pr-1 pl-1 rounded">
	                        			Follow Up Admin
	                        		</button>
	                        		@else
	                        			Transaksi Selesai
	                        		@endif
	                        		</td>
	                        	</tr>
	                        	@endif
	                        	@endforeach
	                        	
                        	@endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</body>