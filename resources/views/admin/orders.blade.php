@extends('admin_layout.admin')

@section('title')
    Commande
@endsection

@section('style')
<link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Commande</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Commande</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Toutes les commandes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-danger">
                    {{ Session::get('status') }}
                </div>
            @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Adresse</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Commande</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($commandes as $commande)
                      <tr>
                        <td>{{$commande->created_at}}</td>
                        <td>{{$commande->adresse}}</td>
                        <td>{{$commande->nom}}</td>
                        <td>{{$commande->prenom}}</td>
                        <td>{{$commande->email}}</td>

                        <td>
                            {{$commande->panier}}

                                {{-- @foreach ($commande->panier->items as $item)
                                {{$item['nom']}}
                                @endforeach --}}
                        </td>
                        <td>
                          {{-- <a href="{{url('voircommandepdf/'.$commande->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i></a> --}}
                          <a href="{{url('delete_commandes/'.$commande->id)}}" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>

                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Adresse</th>
                    <th>Nom du client</th>
                    <th>Commande</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('scripts')
<!-- DataTables -->
<script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script src="backend/dist/js/bootbox.min.js"></script>
<!-- page script -->

<script>
$(document).on("click", "#delete", function(e){
e.preventDefault();
var link = $(this).attr("href");
bootbox.confirm("Voulez-vous vraiment supprimer cet élément ?", function(confirmed){
  if (confirmed){
      window.location.href = link;
    };
  });
});
</script>
<!-- page script -->
<script>
$(function () {
  $("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
  });
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
</script>
@endsection
