@extends('admin_layout.admin')

@section('title')
    Modifier produit
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                                <h3 class="card-title">Modifier produit</h3>
                            </div>

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $errors }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (Session::has('status'))
                                <div class="alert alert-success">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{-- <form id="quickForm"> --}}
                            {!! Form::open(['action' => 'App\Http\Controllers\ProductController@updateproduct', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::hidden('id', $produit->id) }}
                                    {{ Form::label('', 'Nom du produit', ['for' => 'exampleInputEmail1']) }}
                                    {{ Form::text('nom_produit', $produit->nom_produit, ['class' => 'form-control', 'id' => 'exampleInputEmail', 'placeholder' => 'Enter product']) }}
                                </div>


                                <div class="form-group">
                                    {{ Form::label('', 'Prix du produit', ['for' => 'exampleInputEmail1']) }}
                                    {{ Form::number('prix', $produit->prix, ['class' => 'form-control', 'id' => 'exampleInputEmail', 'placeholder' => 'Enter product price']) }}
                                </div>


                                <div class="form-group">
                                    {{Form::label('', 'Description', ['for' => 'exampleInputEmail1'])}}
                                    {{Form::text('description', $produit->description, ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Entrer une description'])}}
                                </div>

                                {{-- <div class="form-group">
                                    {{ Form::label('', 'Catégorie produit') }}
                                    {{ Form::select('nom_cat', $categories, $produit->nom_cat, ['class' => 'form-control select2']) }}
                                </div> --}}


                                <div class="form-group">
                                    {{Form::label('', 'Id de la catégorie', ['for' => 'exampleInputEmail1'])}}
                                    {{Form::number('category_id', $produit->category_id, ['class' => 'form-control', 'id' => 'exampleInputEmail', 'placeholder' => 'Entrer id de la cat'])}}
                                </div>


                                <label for="exampleInputFile">Image produit</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        {{ Form::file('photo_principale', ['class' => 'custom-file-input', 'id' => 'exampleInputFile']) }}
                                        {{ Form::label('', 'Choose file', ['class' => 'custom-file-label', 'for' => 'exampleInputFile']) }}
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                                {{-- <input type="submit" class="btn btn-success" value="Save"> --}}
                                {{ Form::submit('Modifier', ['class' => 'btn btn-success']) }}
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
