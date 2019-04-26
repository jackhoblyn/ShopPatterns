@extends('layouts.admin')

@section('content')

<div style="margin-left: 11%; margin-top: 2%">

    <div style="float: left">
      <h1 style="color: green; margin-left: -1rem;">Admin Dashboard </h1>
    </div>
    <div style="float: right; margin-right: 10rem;">
      <form method="GET" action="/admin/search">
        <div class="input-group">
          <input type="text" name="q" placeholder="search for something" class="form-control">
          <button style="margin-left: 1rem;" class="btn btn-primary" type="submit">Search</button>
        </div>
          
      
      </form>
    </div>

  </div>
</div>
<div style="min-height: 100%; margin-bottom: 25%">
  <div style="margin-left:10%; margin-top: 5rem; width: 15%; float: left;">
      <h2>Order by:</h2>
      <a href="{{ Request::fullUrlWithQuery(['sort' => 'manufacturer']) }}" style="font-size: 2rem; color:orange; font-family: calibri";>Manufacturer</a><br>
      <a href="{{ Request::fullUrlWithQuery(['sort' => 'category']) }}" style="font-size: 2rem; color:orange; font-family: calibri";>Category</a><br>
      <a href="{{ Request::fullUrlWithQuery(['sort' => 'price']) }}" style="font-size: 2rem; color:orange; font-family: calibri";>Price</a><br>
      <a href="/admin" style="font-size: 2rem; color:#00ff00; font-family: calibri";>Clear</a><br>
      <div style="margin-top: 3rem">
        <a href="/admin/customers" style="font-size: 1.5rem; color:blue; font-family: calibri; margin-top: 2rem;">View Customers</a><br>
        <a href="/admin/register" style="font-size: 1.5rem; color:blue; font-family: calibri; margin-top: 2rem;">Register new admin</a><br>
      </div>
  </div>

  <div class="row" style="margin-left: 10%; margin-right: 10%; margin-top: 3%">
      @forelse ($products as $product)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
           <a href="{{ $product->path() }}"><img class="card-img-top" src="/images/{{ $product->image }}" alt=""></a>


          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ $product->path() }}" class="text-black no-underline">{{ $product->name }}</a>
            </h4>
            <h5>€{{ $product->price }}</h5>
            <p class="card-text">{{ $product->manufacturer }}</p>
          

           @foreach(range(1,5) as $i)
                <span class="fa-stack" style="width:1em">
                    <i class="far fa-star fa-stack-1x"></i>

                    @if($product->rating >0)
                        @if($product->rating >0.5)
                            <i class="fas fa-star fa-stack-1x"></i>
                        @else
                            <i class="fas fa-star-half fa-stack-1x"></i>
                        @endif
                    @endif
                    @php $product->rating--; @endphp
                </span>
            @endforeach
            
            <div style="width: 100%; display: flex">

                <p class="card-text" style="float: left">Stock remaining : {{ $product->stock }}</p>
                    <form action="/admin/increase/{{ $product->id }}" method="POST" style="padding-left: 30px;">
                        @csrf
                        @method('PATCH')
                    <button type="submit" class="btn btn-danger btn-sm" style="margin: 5px;"><i class="fas fa-plus"></i></button></form>
                    <form action="/admin/decrease/{{ $product->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <button class="btn btn-danger btn-sm" style="margin: 5px;" data-toggle="tooltip" title="Add one stock item"><i class="fas fa-minus"></i></button></form>
                    <a href="{{ $product->edit() }}">
                    <button class="btn btn-danger btn-sm" style="margin: 5px;"><i class="far fa-edit"></i></button></a>

            </div>

        </div>
      </div>
    </div>
    @empty
      <div style="margin-top: 10%; margin-left: 15%; padding-top: 7%; font-family: 'Nunito';"><h1>Nothing to show yet!</h1></div>
    @endforelse

  </div>
</div>


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>


<!-- Footer -->
<footer class="py-5 bg-dark" style="margin-bottom: -6rem; margin-top: 100px;">
<div class="container">
  <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
</div>
<!-- /.container -->
</footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
