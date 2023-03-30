@extends('admin_layout.admin')

@section('title')
    Ajouter produit
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Produit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Produit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Ajouter produit</h3>
                            </div>

                               @if(count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
              @endif

              @if (Session::has('status'))
              <div class="alert alert-success">
                  {{Session::get('status')}}
              </div>
              @endif
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{-- <form id="quickForm"> --}}
                                {!!Form::open(['action' => 'App\Http\Controllers\ProductController@saveproduct', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}

                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        {{-- <label for="exampleInputEmail1">Product name</label>
                                        <input type="text" name="product_name" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter product name"> --}}

                    {{Form::label('', 'Nom du produit', ['for' => 'exampleInputEmail1'])}}

                    {{Form::text('nom_produit', '', ['class' => 'form-control', 'id' => 'exampleInputEmail', 'placeholder' => 'Entrer le nom du produit'])}}

                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="exampleInputEmail1">Product price</label>
                                        <input type="number" name="product_price" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter product price" min="1"> --}}

                                        {{Form::label('', 'Prix du produit', ['for' => 'exampleInputEmail1'])}}

                                        {{Form::text('prix', '', ['class' => 'form-control', 'id' => 'exampleInputEmail', 'placeholder' => 'Entrer le prix du produit'])}}

                                    </div>


                                    <div class="form-group">
                                        {{-- <label for="exampleInputEmail1">Product price</label>
                                        <input type="number" name="product_price" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter product price" min="1"> --}}

                                        {{Form::label('', 'Description', ['for' => 'exampleInputEmail1'])}}

                                        {{Form::text('description', '', ['class' => 'form-control', 'id' => 'exampleInputEmail', 'placeholder' => 'Entrer la description'])}}

                                    </div>

                                    <div class="form-group">

                                        {{Form::label('', 'Catégorie du produit')}}
                                        {{Form::number('category_id', '', ['class' => 'form-control', 'id' => 'exampleInputEmail', 'placeholder' => 'Entrer la catégorie'])}}

                                        {{-- {{Form::select('category_id', $produits , null, ['placeholder' => 'Choisir une catégorie', 'class' => 'form-control select2'])}} --}}
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="exampleInputEmail1">Product price</label>
                                        <input type="number" name="product_price" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter product price" min="1"> --}}

                                        {{-- {{Form::label('', 'Id de la catégorie', ['for' => 'exampleInputEmail1'])}}
                                        {{Form::number('category_id', '', ['class' => 'form-control', 'id' => 'exampleInputEmail', 'placeholder' => 'Entrer id de la cat'])}} --}}
                                        {{-- {{Form::select('category_id', $produits , null, ['placeholder' => 'Choisir une catégorie', 'class' => 'form-control select2'])}} --}}


                                    </div>


                                    <label for="exampleInputFile">Image du produit</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            {{-- <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label> --}}

                                            {{Form::file('photo_principale', ['class' => 'custom-file-input', 'id' => 'exampleInputFile'])}}
                                            {{Form::label('', 'Choisir image', ['class' => 'custom-file-label', 'for' => 'exampleInputFile'])}}

                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Télécharger</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                                    {{-- <input type="submit" class="btn btn-success" value="Save"> --}}
                                    {{Form::submit('Enregistrer', ['class' => 'btn btn-success'])}}
                                </div>
                                {!! Form::close() !!}
                            {{-- </form> --}}
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>

    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
