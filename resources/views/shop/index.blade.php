@extends('home')
@section('content')
    <div class="album py-5" style="background-color: grey">
        <div class="container">

            <div class="row">
                {{-- {{dump($produits)}} --}}

                @foreach ($produits as  $produit)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="img-fluid" class="bd-placeholder-img card-img-top" src="{{ asset('storage/photo_principale/' . $produit->photo_principale) }}"  width="100%" height="225"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                            role="img" aria-label="Placeholder: Thumbnail">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em"></text>
                        </img>

                        <div class="card-body">
                            <p class="card-text">{{$produit->nom_produit}} <br> {{$produit->description}} <br>
                                <span class="badge badge-info">
                            {{-- <a href="{{route('voir_produit_par_cat', ['id'=>$produit->category->id])}}">{{$produit->category->nom_cat}}</a> --}}
                        </span>
                            </p>



                            <div class="d-flex justify-content-between align-items-center">
                                     <span class="price">{{$produit->prix}} €</span>
                                    {{-- <a href="{{url('ajouteraupanier/'.$produit->id)}}" class="btn btn-sm btn-outline-secondary"> <i class="fa-solid fa-cart-shopping"></i></a> --}}
                                <a href="{{route('voir_produit',['id'=>$produit->id])}}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
