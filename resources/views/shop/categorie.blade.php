@extends('shop')

@section('content')
{{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">

        @if ($category->parent_id !== null)
        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('voir_produit_par_cat', ['id'=>$category->parent->id])}}">{{$category->parent->nom}}</a></li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">{{$category->nom}}</li>
        @foreach ($category->childrens as $children )
        <li class="breadcrumb-item"><a href="{{route('voir_produit_par_cat', ['id'=>$children->id])}}">{{$children->nom}}</a></li>
        @endforeach
    </ol>
</nav> --}}

<main role="main">


    <div class="py-3">
        <div class="container-fluid">
            <div class="row">
                @foreach($produits as $produit)
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <img src="/storage/photo_principale/{{$produit->photo_principale}}" class="card-img-top img-fluid" alt="{{$produit->nom_produit}}">
                            <div class="card-body">
                                <p class="card-text">{{$produit->nom_produit}} <br>{{$produit->description}} <br>  <span class="badge badge-info">
                                    <a href="{{route('voir_produit_par_cat', ['id'=>$produit->category->id])}}">{{$produit->category->nom_cat}}</a>
                                </span> </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">{{$produit->prix}} €</span>
                                    <a href="{{route('voir_produit', ['id'=>$produit->id])}}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach



            </div>
        </div>
    </div>

</main>
@endsection
