@extends('Painel.Layouts.index')

@section('content')
<section class="content">
        <div id="app-2">
                <span v-bind:title="message">
                  Pare o mouse sobre mim e veja a dica interligada dinamicamente!
                </span>
              </div>
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Perfis</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
        <tr>
            <th style="width: 10px">#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th style="width: 40px">Grupo</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
            <td>{{$role->id}}.</td>
            <td>{{$role->name}}</td>
            <td>{{$role->label}}</td>
            <td>{{$role->grupo}}</td>
            </tr>
        @endforeach

        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
        <li><a href="#">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
    </div>
    <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box" data-toggle="modal" data-target="#modal-default">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Cadastro de Perfis</span>
                  <span class="info-box-number">90<small>%</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
    </div>


    <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cadastro de Perfil</h4>
                    </div>
                    <div class="modal-body" >
                        <form role="form" id="vueApp">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Enter nome">
                                </div>
                                <div class="form-group">
                                        <label>Textarea</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
