<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-white">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar box-shadow" style="background-color: black" >
        <div class="container d-flex justify-content-between">  <a href="{{ url('/') }}"> <img src="{{ asset('frontend/images/logo.png') }}" alt="" width="130px" height="130px"></a>
            <a href="{{route('homepage')}}" class="navbar-brand d-flex align-items-center">

                {{-- <strong>Mon T-Shirt</strong> --}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/panier') }}"><i class="fa fa-shopping-cart"></i> Panier</a>
                </li>
            </ul>


            @if (Session::has('admin'))
            <ul class="navbar-nav">

            <li class="nav-item active">
               <a href="{{ url('/logout') }}" class="nav-link">Se déconnecter</a>
           </li>
       </ul>

        @else
           <ul class="navbar-nav">
               <li class="nav-item active">
                   <a class="nav-link" href="{{ url('login') }}">Espace admin</a>
               </li>
               @endif

           </ul>

             {{-- Espace client --}}
             @if (Session::has('client'))
             <ul class="navbar-nav">

             <li class="nav-item active">
                <a href="{{ url('/logout') }}" class="nav-link">Se déconnecter</a>
            </li>
        </ul>

         @else
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('login1') }}">Se connecter</a>
                </li>
                @endif

            </ul>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-red">
        <a class="navbar-brand" href=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <a href="" class="navbar-brand">
            </a>
            <ul class="navbar-nav">
                @foreach($categories as $category)

                <li class="nav-item">
                     <a class="nav-link" href="{{route('voir_produit_par_cat',['id'=>$category->id])}}">{{ $category->nom_cat }} </a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>

{{-- <img src="{{ asset('frontend/images/logo.png') }}" alt="" width="150" height="150"> --}}
