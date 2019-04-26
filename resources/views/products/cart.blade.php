@extends('layouts.app')

@section('content')
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th style="width:50%">Product</th>
				<th style="width:10%; visibility: hidden;">Price</th>
				<th style="width:8%">Manufacturer</th>
				<th style="width:22%" class="text-center">Price</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
		<tbody>
			@forelse ($items as $item)
			<tr>
				<td data-th="Product">

					<div class="row">
						<div class="col-sm-2 hidden-xs"><img class="d-block img-fluid" src="/images/{{ $item->attributes->image }}" alt="Second slide"></div>
						<div class="col-sm-10" style="padding-left: 3rem;">
							<a href="/products/{{ $item->id}} " class="text-black no-underline"><h4 class="nomargin">{{ $item->name }}</h4></a>
							<p>{{ $item->attributes->manufacturer }}</p>
						</div>
					</div>
				</td>
				<td data-th="Price"></td>
				<td data-th="Quantity">{{ $item->attributes->manufacturer }}</td>
				<td data-th="Price" class="text-center">{{ $item->price }}</td>
				<td class="actions" data-th="">
				<form method="post" action="/cart/delete/{{ $item->id }}"> 
				    {{ method_field('DELETE')}}
				    @csrf
				    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
				</form>
				</td>
			</tr>
		</tbody>
		@empty
        	<div style="min-width: 100px; min-height: 100px; margin-top: 5rem;">
    			<h1>There's nothing in your cart just yet! Keep shopping</h1>
			</div>
        @endforelse
        <div style="margin-top: 5rem">
			<tfoot>
				<tr style="margin-top: 5rem;">
					<td><a href="/home" class="btn btn-warning" style="margin-top: 5rem;"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
					<td colspan="2" class="hidden-xs"></td>
					<td class="hidden-xs text-center" style="margin-top: 5rem;"><h1 style="margin-top: 5rem">€{{$items->sum('price')}}</h1></td>
					<td><a href="/cart/checkout" class="btn btn-success btn-block" style="margin-top: 5rem;">Checkout <i class="fa fa-angle-right"></i></a></td>
				</tr>
			</tfoot>
		</div>
		

	</table>
</div>
@endsection