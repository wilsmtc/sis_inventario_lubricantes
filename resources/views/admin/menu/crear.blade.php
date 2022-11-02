@extends("theme.$theme.layout")
@section('titulo')
    Crear Menú
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/menu/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Menús
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
             Crear Menú
        </small>
        <div class="box-tools pull-right">
            <a href="{{route('menu')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route ('guardar_menu')}}" id="form-general" method="POST">
            @csrf
            @include('admin.menu.form')
            <div class="box-footer">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    @include('botones.crear')
                </div>
            </div>
        </form>
    </div>
</div>
@endsection