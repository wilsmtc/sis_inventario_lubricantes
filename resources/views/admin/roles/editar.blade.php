@extends("theme.$theme.layout")
@section('titulo')
    Editar Rol
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/rol/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
    <div class="page-header">
        <h1>
            Roles
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Editar Rol
            </small>
            <div class="box-tools pull-right">
                <a href="{{route('rol')}}" class="btn btn-block btn-info btn-sm">
                    <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                </a>
            </div>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('mensajes.error')
            @include('mensajes.incorrecto')
            <form class="form-horizontal" action="{{route('actualizar_rol', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST">
                @csrf @method("put")
                @include('admin.roles.form')
                <div class="box-footer">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-6">
                        @include('botones.actualizar')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection