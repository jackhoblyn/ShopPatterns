@extends('layouts.app')

@section('content')

<div style="margin-left: 11%; margin-top: 2%">

    <div style="float: left">
      <h1 style="color: green; margin-left: -1rem;"> Search Results </h1>
    </div>
    <div style="float: right; margin-right: 10rem;">
      <form method="GET" action="search">
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
  </div>

  <div class="row" style="margin-left: 10%; margin-right: 10%; margin-top: 3%">
      @forelse ($products as $product)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="/images/{{ $product->image }}" alt=""></a>


          <div class="card-body">
            <h4 class="card-title">
              <a href="#">{{ $product->name }}</a>
            </h4>
            <h5>€{{ $product->price }}</h5>
            <p class="card-text">{{ $product->manufacturer }}</p>
          </div>

          <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
          </div>
        </div>
      </div>
      @empty
        <div style="margin-top: 10%; margin-left: 15%; padding-top: 7%; font-family: 'Nunito';"><h1>Nothing to show yet!</h1></div>
      @endforelse

  </div>
</div>





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
