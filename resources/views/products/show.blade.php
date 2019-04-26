@extends('layouts.app')

@section('content')


<div class="container">

  <div class="row">

    <!-- /.col-lg-3 -->

      <div class="card mt-4">
        <img class="card-img-top img-fluid" src="/images/{{ $product->image }}" style="
            max-height: 900px;
            max-width: 600px;
            margin-top: 5%;
            margin-bottom: 5%;
            margin-left: auto;
            margin-right: auto;">
        <div class="card-body">
          <h3 class="card-title">{{ $product->name }}</h3>
          <h4>€{{ $product->price }}</h4>
          <p class="card-text">{{ $product->description }}</p>
         <!--  <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
          4.0 stars -->

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

          <div style="margin-top: 1rem;">
            <form action="/cart" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $product->id }}">
              <input type="hidden" name="name" value="{{ $product->name }}">
              <input type="hidden" name="price" value="{{ $product->price }}">
              <input type="hidden" name="qty" value="{{ $product->stock }}">
              <input type="hidden" name="category" value="{{ $product->category }}">
              <input type="hidden" name="image" value="{{ $product->image }}">
              <input type="hidden" name="manufacturer" value="{{ $product->manufacturer }}">

             <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
          </div>

        </div>



      </div>
      
      <!-- /.card -->
      <div class="card card-outline-secondary my-4" style="min-width: 100%">
        <div class="card-header">
            Product Reviews
            @forelse ($product->reviews as $review)
        </div>

          <div class="card-body">
            <h3>{{$review->name}}</h3>
            <p>{{$review->description}}</p>

            @foreach(range(1,5) as $i)
                <span class="fa-stack" style="width:1em">
                    <i class="far fa-star fa-stack-1x"></i>

                    @if($review->rating >0)
                        @if($review->rating >0.5)
                            <i class="fas fa-star fa-stack-1x"></i>
                        @else
                            <i class="fas fa-star-half fa-stack-1x"></i>
                        @endif
                    @endif
                    @php $review->rating--; @endphp
                </span>
            @endforeach
            
            <div>
              <br><small class="text-muted">Posted by {{$review->user->name}}</small>
            </div>
            <hr>
            @empty
            <div class="card-body">
            <h3>Nothing Yet!</h3>
            @endforelse
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
          <h2>Feedback</h2>
          <table width="100%" border="0">
            <div class="col-md-9 col-md-offset-0">
              <tr><td width="77%">
              <div class="">
                <form action="/products/{{ $product->id }}" method="POST">
                  @csrf
                <fieldset>
    
            <!-- Name input-->
              <div class="form-group">
                <label class="col-md-3 control-label" for="name">Title</label>
                <div class="col-md-9">
                  <input id="name" name="name" type="text" placeholder="Review Title" class="form-control">
                </div>
              </div>
    
            <!-- Message body -->
              <div class="form-group">
                <label class="col-md-3 control-label" for="message">Review</label>
                <div class="col-md-9">
                  <textarea class="form-control" id="description" name="description" placeholder="Please enter your feedback here..." rows="5"></textarea>
                </div>
              </div>


            <!-- Rating -->
 
            <div class="container" style="padding-right: 43rem;">
                    <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                    </div>
              </div>


            <div class="form-group">
              <div class="col-md-9">
              <button type="submit" class="btn btn-primary btn-md">Submit</button>
              </div>
            </div>
    </td>
    <td align="center" valign="top" width="23%">
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-center">
                
              </div>
            </div>
          </fieldset>
          </form>
        </div>
    </div>
    </td>
    </tr>
    </table>
</div>

     



<!-- Footer -->
<footer class="py-5 bg-dark" style="min-width: 100rem; margin-left: -230px; margin-top: 4rem;">
<div class="container">
  <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
</div>
<!-- /.container -->
</footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
