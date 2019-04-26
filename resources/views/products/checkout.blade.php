@extends('layouts.app')

@section('content')

   <div class="col-md-6 offset-md-3">
    <span class="anchor" id="formPayment"></span>
    <hr class="my-5">

    <!-- form card cc payment -->
    <div class="card card-outline-secondary">
        <div class="card-body">
            <h3 class="text-center">Credit Card Payment</h3>
            <hr>
            <div class="p-2 pb-3 text-center">
               <h1 style="color: green">Total Due: €{{$items->sum('price')}}</h1>
            </div>
            <form class="form" method="POST" role="form" action="/cart/checkout" autocomplete="off">
              @csrf
                <div class="form-group">
                    <label for="cc_name">Card Holder's Name</label>
                    <input type="text" class="form-control" id="cc_name" pattern="\w+ \w+.*" title="First and last name" name="name" required="required">
                </div>
                <div class="form-group">
                    <label for="cc_name">Address Line 1</label>
                    <input type="text" class="form-control" id="cc_name" pattern="\w+ \w+.*" title="Address1" name="address1" required="required">
                </div>
                <div class="form-group">
                    <label for="cc_name">Address Line 2</label>
                    <input type="text" class="form-control" id="cc_name" pattern="\w+ \w+.*" title="Address2" name="address2" required="required">
                </div>
                <div class="form-group">
                    <label for="cc_name">Country</label>
                    <input type="text" class="form-control" id="cc_name" title="Country" name="country" required="required">
                </div>
                <div class="form-group">
                    <label>Card Number</label>
                    <input type="text" class="form-control" autocomplete="off" maxlength="20" pattern="\d{16}" name="cardnum" title="Credit card number" required="">
                </div>
                <div class="form-group row">
                    <label class="col-md-12">Card Exp. Date</label>
                    <div class="col-md-4">
                        <select name="expMonth" id="expMonth" class="form-control" size="0" required>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="expYear" id="expYear" class="form-control" size="0" required>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input name="CVC" id="CVC" type="text" class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required=""  placeholder="CVC">
                    </div>
                </div>
                <div class="form-group row" style="margin-top: 4rem;">
                    <div class="col-md-6">
                        <button type="reset" class="btn btn-default btn-lg btn-block">Cancel</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




<!-- Footer -->
<div style="margin-left: -30rem; margin-right: -30rem; margin-top: 10rem; min-width: 1700px">
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
  <!-- /.container -->
  </footer>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
