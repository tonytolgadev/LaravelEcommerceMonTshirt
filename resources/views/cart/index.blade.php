@extends('shop')

@section('content')
<main role="main">
    <section class="py-5">
        <div class="container">
                <h1 class="jumbotron-heading"> <span class="badge badge-primary ">Votre panier </span></h1>
            <table class="table table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Produit</th>
                        <th>Qte</th>
                        <th>P.U</th>
                        <th>Prix TTC</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp

                    @foreach ($content as $produit )

                    @php $total += $produit->price * $produit->quantity @endphp
                <tr>
                    <td class="product-remove"><a
                        href="{{ url('suppdupanier/'.$produit['id']) }}">
                        <input type="submit" class="btn btn-danger" value="Supprimer">
                    </a></td>
                    <td>
                        {{-- <img width="110" class="rounded-circle img-thumbnail" src="{{asset('produits/'.$produit->attributes['photo'])}}" alt=""> --}}
                        {{$produit->name}}
                        <p>
                            Taille: {{strtoupper($produit->attributes['size'])}}
                        </p>
                    </td>

                    <form action="{{url('modifier_quant/'.$produit['id'])}}" method="POST">
                    <td>

                                <input disabled type="text" style="display: inline-block" id="qte" class="form-control col-sm-4" type="number"           value="{{$produit->quantity}}" min="1" max="100">
                            {{-- <br> <br> --}}
                                {{-- <input type="submit" class="btn btn-success" value="Valider"> --}}


                                {{-- <a  class="pl-2" href=""><i class="fas fa-sync"></i> </a> --}}
                    </td>
                </form>
                    <td>
                        {{$produit->price}} €
                    </td>
                    <td>
                        {{number_format($produit->price * $produit->quantity,2)}} €
                    </td>
                </tr>
                @endforeach
                @if (Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td>Total TTC</td>
                    <td>{{$total}} €</td>
                </tr>
                {{-- <tr>
                    <td colspan="2"></td>
                    <td>TVA (20%)</td>
                    <td>4.83 €</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Total TTC</td>
                    <td>{{number_format($total_ttc_panier, 2)}} €</td>
                </tr> --}}
                </tfoot>
            </table>
            <a class="btn btn-block btn-outline-dark" href="{{url('/paiement')}}">Commander</a>
        </div>
    </section>
</main>
@endsection
