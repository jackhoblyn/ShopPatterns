@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="font-size:1.6rem; margin-top: 2rem;  margin-bottom: 2rem; font-family: 'Nunito', sans-serif;">What can we help you with,  {{ Auth::user()->name }}? </h2>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

   
      <!-- /.col-lg-3 -->

      <div>

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" style="margin-bottom: 5rem">
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

  <div style="margin-top: 2rem; margin-bottom: 1rem; padding-left: 1rem">
    <a href="/products"><button type="button" class="btn btn-warning btn-lg">View all products</button></a>
  </div>


<div class="row" style="margin-top: 3rem;">
  

    
    @forelse ($products as $product)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="{{ $product->path() }}"><img class="card-img-top" src="/images/{{ $product->image }}" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ $product->path() }}" class="text-black no-underline">{{ $product->name }}</a>
            </h4>
          <h5>€{{ $product->price }}</h5>
          
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
