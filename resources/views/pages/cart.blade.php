@extends('pages.layout')

@section('content')
<div class="container">
<div class="row">
<form action="{{url('/payment')}}" method="post" id="payment-form">
  {{csrf_field()}}
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>
</div>
</div>

@endsection