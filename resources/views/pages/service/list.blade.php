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
              <h2 class="card-title">Test List</h2>
              <a href="{{route('service.create')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle"> Add Test</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead class="bg-info">
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($services as $key=>$service)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$service->name}}</td>
                  <td>{{$service->price}}</td>
                  <td>
                    <a href="javascript:void();" title="edit" class="btn btn-sm btn-info" href=""><i class="fa fa-edit"></i></a>
                    <a href="javascript:void();" class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
                  </td>
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