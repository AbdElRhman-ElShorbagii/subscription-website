@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Monthly package</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$50<small class="text-muted fw-light">/monthly</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>10 users included</li>
                    <li>2 GB of storage</li>
                    <li>Email support</li>
                    <li>Help center access</li>
                  </ul>
                  <form>              
                    <a class="btn btn-primary" href="{{ route('checkout',300) }}">Checkout</a>
                  </form>
                </div>
              </div>
            </div>
          </div>      
    </div>
</main>
@endsection