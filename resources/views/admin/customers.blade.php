@extends('layouts.admin')

@section('content')

<div style="margin-left: 11%; margin-top: 2%">

    <div style="float: left">
      <h1 style="color: green; margin-left: -1rem;"> All Customers </h1>
    </div>
</div>
    


<div style="min-height: 100%; margin-bottom: 25%">
  <div class="row" style="margin-left: 10%; margin-right: 10%; margin-top: 3%">
      @forelse ($customers as $customer)
      <div class="col-lg-4 col-md-6 mb-4" style="margin-top: 5rem;">
        <div class="card h-100">
          


          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ $customer->path() }}" class="text-black no-underline">{{ $customer->name }}</a>
            </h4>
            <h5>{{ $customer->email }}</h5>
            
          

           
          </div>
      </div>
    </div>
    @empty
      <div style="margin-top: 10%; margin-left: 15%; padding-top: 7%; font-family: 'Nunito';"><h1>Nothing to show yet!</h1></div>
    @endforelse

  </div>
</div>





<!-- Footer -->
<footer class="py-5 bg-dark" style="margin-bottom: -20rem; margin-top: 28rem;">
<div class="container">
  <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
</div>
<!-- /.container -->
</footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
