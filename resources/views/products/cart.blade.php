@extends('layouts.app')

@section('content')
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th style="width:50%">Product</th>
				<th style="width:10%">Price</th>
				<th style="width:8%">Quantity</th>
				<th style="width:22%" class="text-center">Subtotal</th>
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
							<h4 class="nomargin">{{ $item->name }}</h4>
							<p>{{ $item->attributes->manufacturer }}</p>
						</div>
					</div>
				</td>
				<td data-th="Price">{{ $item->price }}</td>
				<td data-th="Quantity">{{ $item->attributes->manufacturer }}</td>
				<td data-th="Subtotal" class="text-center">{{ $item->price }}</td>
				<td class="actions" data-th="">
					<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
				</td>
			</tr>

			@empty
	        	<h5>Nothing to show</h5>
	        @endforelse
		</tbody>
		<tfoot>
			<tr>
				<td><a href="/home" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
				<td colspan="2" class="hidden-xs"></td>
				<td class="hidden-xs text-center"><strong>{{$items->sum('price')}}</strong></td>
				<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
			</tr>
		</tfoot>
		

	</table>
</div>
@endsection