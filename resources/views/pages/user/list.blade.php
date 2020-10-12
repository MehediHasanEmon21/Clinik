@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
  
<section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h2 class="card-title">User List</h2>
              {{-- <a href="{{route('user.create')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add User</i></h4></a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead class="bg-info">
                <tr>
                  <th>SL</th>
                  <th>Role</th>
                  <th>Name</th>
                  <th>Email</th>
                  {{-- <th>Action</th> --}}
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $key=>$user)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$user->userType}}
                  </td>
                  <td>{{$user->name}}</td>
                  <td> {{$user->email}}</td>
                  {{-- <td>
                    <a href="javascript:void();" class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
                  </td> --}}
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
          <!-- /.Left col -->

        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection