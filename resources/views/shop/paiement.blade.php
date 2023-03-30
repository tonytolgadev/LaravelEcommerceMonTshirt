@extends('shop')

@section('title')
    Paiement
@endsection
@section('content')
    <!-- start content -->

	<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span> <span></span></p>
              <h1 class="mb-0 bread">Caisse</h1>
            </div>
          </div>
        </div>
      </div>

      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif
                  <form action="{{url('/payer')}}" method="POST" class="billing-form" id="checkout-form">
                    {{ csrf_field() }}
                      <h3 class="mb-4 billing-heading">Détails de la facturation</h3>
                      <div class="row align-items-end">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="firstname">Nom</label>
                              <input type="text" class="form-control" name="nom">
                              </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Prénom</label>
                            <input type="text" class="form-control" name="prenom">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Email</label>
                            <input type="text" class="form-control" name="email">
                            </div>
                        </div>

                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="lastname">Adresse</label>
                              <input type="text" class="form-control"  name="address">
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Code Postal </label>
                            <input type="number" id="card-expiry-month" class="form-control" name="codepostal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Ville</label>
                            <input type="text" id="card-expiry-year" class="form-control" name="ville">
                            </div>
                        </div>

                          {{-- <div class="col-md-12">
                              <div class="form-group">
                                  <label for="lastname">Numéro de carte</label>
                              <input type="text" class="form-control" id="card-number">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="lastname">Mois d'expiration </label>
                              <input type="text" id="card-expiry-month" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="lastname">Année d'expiration</label>
                              <input type="text" id="card-expiry-year" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="lastname">CVC</label>
                              <input type="text" id="card-cvc" class="form-control">
                              </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                                <label for="lastname">Nom sur la carte</label>
                            <input type="text" class="form-control" id="card-name" name="card_name">
                            </div>
                        </div> --}}


                          <div class="col-md-12">
                              <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Achetez maintenant">
                              </div>
                          </div>
                      </div>
                </form><!-- END -->
                      </div>

                      {{-- Pour calculer le total panier --}}
                      @php $total = 0 @endphp

                      @foreach ($content as $produit )

                      @php $total += $produit->price * $produit->quantity @endphp
                      @endforeach

                      <div class="col-xl-5">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Total du panier</h3>
                            <p class="d-flex">
                                  <hr>
                                  <p class="d-flex total-price">
                                      <span></span>
                                      <span style="font-weight: bold;"> {{$total}} €</span>
                                  </p>
                                  </div>

                    </div>
                </div>
            </div> <!-- .col-md-8 -->

          </div>
        </div>

      </section> <!-- .section -->

@endsection

@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="src/js/checkout.js"></script>
<script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });

    });
</script>


@endsection

