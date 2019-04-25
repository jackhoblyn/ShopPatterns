@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="font-size:1.6rem; margin-top: 2rem;  margin-bottom: 2rem; font-family: 'Nunito', sans-serif;">What can we help you with,  {{ Auth::user()->name }}? </h2>

   
      <!-- /.col-lg-3 -->

      <div>

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox" style="margin-left: 2rem">

            <div class="carousel-item active">
                <img class="d-block img-fluid" src="/images/welcome.jpg" alt="First slide">
            </div>
            @forelse ($showProducts as $showproduct)
            <div class="carousel-item">
                <img class="d-block img-fluid" src="/images/{{ $showproduct->image }}" alt="Second slide">
            </div>
            @empty
                Nothing to show
            @endforelse
          
        </div>


      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="row">

    @forelse ($products as $product)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="/images/{{ $product->image }}" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ $product->path() }}" class="text-black no-underline">{{ $product->name }}</a>
            </h4>
          <h5>€{{ $product->price }}</h5>
          <h5>{{ $product->stock }}</h5>
          <p class="card-text">{{ $product->manufacturer }}</p>

          <form action="/cart" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="qty" value="{{ $product->stock }}">
            <input type="hidden" name="category" value="{{ $product->category }}">
            <input type="hidden" name="image" value="{{ $product->image }}">
            <input type="hidden" name="manufacturer" value="{{ $product->manufacturer }}">

            <button type="submit" class="button button-plain">Add to Cart</button>
          </form>
      </div>
      <div class="card-footer">
        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
</div>
</div>
@empty
<div style="margin-top: 15%; margin-left: 15%; padding-top: 7%; font-family: 'Nunito';"><h1>No ads yet!</h1></div>
@endforelse



</div>
<!-- /.row -->

</div>
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
<div class="container">
  <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
</div>
<!-- /.container -->
</footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
