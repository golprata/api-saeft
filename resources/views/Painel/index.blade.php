@extends('Painel.Layouts.index')

@section('content')
<section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3>0</h3>

                <p>Usuários</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="painel/roles" class="small-box-footer">Administrador <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>

            <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>

            <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>



            <form style=""  action="{{ url('api/admin/carteiro/import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

                @csrf



                @if ($errors->any())

                    <div class="alert alert-danger">

                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                @if (Session::has('success'))

                    <div class="alert alert-success">

                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                        <p>{{ Session::get('success') }}</p>

                    </div>

                @endif



                <input type="file" name="import_file" />

                <button class="btn btn-primary">Import File</button>

            </form>



</section>
@endsection
