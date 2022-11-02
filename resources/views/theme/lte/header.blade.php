<link rel="stylesheet" href="{{asset("assets/css/zoom.css")}}">
<div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">
        @php
            $datos=MyHelper::Usuarios_Pendientes();
            $contador=$datos->count();
        @endphp
        @if(session()->get('rol_id')==1 && $contador>=1)
            <li class="grey dropdown-modal">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                    <span class="badge badge-important"> {{$contador}}</span>
                </a>
                <ul class="dropdown-menu-right dropdown-navbar navbar-grey dropdown-menu dropdown-caret dropdown-close">
                    <li class="dropdown-header">
                        <i class="ace-icon fa fa-exclamation-triangle"></i>
                        {{$contador}} Notificationes
                    </li>
                    <li class="dropdown-content">
                        <ul class="dropdown-menu dropdown-navbar navbar-blue">
                            <table id="table">
                            @foreach ($datos as $usuario )                           
                                <li>
                                    <a class="clearfix">
                                        <span class="msg-title">
                                            <span class="blue">{{$usuario->nombre}} {{$usuario->apellido}}</span>
                                            Solicita unirse al sistema con el rol de: <span class="blue">{{$usuario->rol->rol}} </span>
                                        </span>
                                        <form action="{{route('aceptar_usuario', ['id' => $usuario->id])}}" class="d-inline">
                                            <button type="submit" class="btn btn-white btn-success btn-sm" style="border-width: 2px" onclick="return confirm('Desea ACEPTAR a: {{$usuario->nombre}} {{$usuario->apellido}}' )">
                                                <i class="ace-icon fa fa-check bigger-120 success"></i>
                                                Aceptar
                                            </button>
                                        </form> 
                                        <form action="{{route('rechazar_usuario', ['id' => $usuario->id])}}" class="d-inline">  
                                            <button type="submit" class="btn btn-white btn-danger btn-sm pull-right" style="border-width: 2px" onclick="return confirm('¿Esta seguro de RECHAZAR a: {{$usuario->nombre}} {{$usuario->apellido}}?')">
                                                <i class="ace-icon fa fa-close bigger-120 danger"></i>
                                                Rechazar
                                            </button> 
                                        </form> 
                                    </a>
                                </li>                           
                            @endforeach
                            </table>
                        </ul>
                    </li>

                    {{-- <li class="dropdown-footer">
                        <a href="#">
                            See all notifications
                            <i class="ace-icon fa fa-arrow-right"></i>
                        </a>
                    </li> --}}
                </ul>
            </li>
        @endif
        <li class="blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                @php
                    $aux= session()->get('foto_usuario');
                @endphp
                @if(session()->get('foto_usuario')==null)
                    <img class="nav-user-photo" src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" />
                @else
                    <img src="{{Storage::url("datos/fotos/usuario/$aux")}}" class="nav-user-photo" >                  
                @endif
                
                <span class="user-info">
                    <small>Bienvenido</small>
                    {{session()->get('usuario')}}
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu-right dropdown-navbar navbar-grey dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header" style="text-align: center;  background-color: rgb(253, 179, 43)">
                    <i class="menu-icon fa fa-user icon-animated-vertical"> <b> Perfil de Usuario</b></i>
                    
                </li>

                <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar">
                        <li style="background: rgb(281, 211, 110)">
                            <a href="#" class="clearfix" align='center' >
                                @if(session()->get('foto_usuario')==null)
                                    <img class="img-circle" src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" width="35%"/>
                                @else
                                    <img class="img-circle zoom" style="center" src="{{Storage::url("datos/fotos/usuario/$aux")}}" width="35%">                  
                                @endif
                            </a>
                            <a href="#">                               
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue"><b>Usuario:</b>&nbsp;</span>
                                <b>  {{session()->get('usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue"><b>Nombre:</b></span>
                                <b>  {{session()->get('nombre_usuario')}} {{session()->get('apellido_usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue"><b>Correo:</b>&nbsp;</span>
                                <b> &nbsp; {{session()->get('email_usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue"><b>Rol:</b>&nbsp; &nbsp; &nbsp; &nbsp;</span>
                                <b>  &nbsp; {{session()->get('rol_usuario')}}</b>
                                <br>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-footer"  style="background: #ffc340">
                    <div class="col-lg-12" style="width: 100%">
                        <div class="col-lg-6 center">
                            <button style="border-color: rgb(100, 144, 236); border-radius: 40%" onclick="location.href='{{route('editar_mi_usuario', ['id' => session()->get('usuario_id')])}}'" class="btn btn-xs btn-info pull-left" title="editar usuario">
                                <i class="ace-icon fa fa-pencil bigger-120"> Editar</i>
                            </button>
                        </div>
                        <div class="col-lg-6 center">
                            <button style="border-color: rgb(173, 173, 146); border-radius: 40%" onclick="location.href='{{route('logout')}}'" class="btn btn-xs btn-inverse pull-right" title="salir del sistema">
                                <i class="ace-icon fa fa-close bigger-120"> Salir</i>
                            </button> 
                        </div>
                    </div>
                    <br>               
                </li> 
            </ul>
        </li>
    </ul>
</div>
