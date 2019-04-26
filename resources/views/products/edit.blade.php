@extends('layouts.admin')

@section('content')
<div class = "flex items center" style="padding-left: 8rem; padding-right: 8rem;">
	<form method="POST" class="mx-auto bg-white shadow-lger rounded px-8 pt-6 pb-8 mb-4 ml-9" action="{{$product->edit()}}" style="min-width: 80%">
		@csrf
		@method('PATCH')
		<div class="mb-4">
			<h1 class="text-center text-red mb-6 pb-6 mt-5 pt-5" style="font-size: 3rem">Edit this Product</h1>

			<label class="block text-blue text-sm font-bold mb-2 mt-3" for="price" style="font-size: 1.2rem">stock</label>
			<div class="mb-4-6">
				<input type="number" style="margin:1rem" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="stock" placeholder="stock" value="{{ $product->stock }}">
			</div>

			
				<button type="submit" class="mt-6 button is-link mr-2" style="float: left;">Update</button>
				
				<a href="/admin">
					<button type="submit" class="mt-6 button is-link mr-2" style="background-color: #fc6821;">Cancel </button>
				</a>
			
			</div>
		</div>
	</form>

@endsection