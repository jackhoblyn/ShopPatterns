@extends('layouts.admin')

@section('content')


<div class="container">

  <div class="row">

    <!-- /.col-lg-3 -->

      <div class="card mt-4">
        <div class="card-body">
          <h3 class="card-title">{{ $user->name }}</h3>
          
          <p class="card-text">{{ $user->email }}</p>
         <!--  <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
          4.0 stars -->

           

          

        </div>



      </div>
      
      <!-- /.card -->
      <div class="card card-outline-secondary my-4" style="min-width: 100%">
        <div class="card-header">
            Orders
           
        </div>
        @forelse ($user->orders as $order)

          <div class="card-body">
            <p>Address line 1: {{$order->address1}}</p>
            <p>Address line 1: {{$order->address2}}</p>
            <h3>€{{ $order->amount}}</h3>
          </div>

          
    
            @empty
            <div class="card-body">
            <h3>Nothing Yet!</h3>
            @endforelse
            </div>
          </div>
        </div>
        
</div>

     



<!-- Footer -->
<footer class="py-5 bg-dark" style="min-width: 100rem; margin-left: -230px; margin-top: 24rem;">
<div class="container">
  <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
</div>
<!-- /.container -->
</footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
