<div class="form-group">    
    <label class="control-label">
        <div class="main container" float="rigth" width="100%">
            <div class="col-lg-3">
                @if($usuario->foto!=null)
                    <img src="{{Storage::url("datos/fotos/usuario/$usuario->foto")}}" width="250px" height="280px" >        
                @else
                    <img src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" width="250px" height="280px" />
                @endif
            </div> 
            <div class="col-lg-3">
                <label class="control-label">
                    <div style=""><u><b>Nombre</b></u>: <i>{{$usuario->nombre}}  {{$usuario->apellido}}</i></div>
                    <div style=""><u><b>Usuario</b></u>: <i>{{$usuario->usuario}}</i></div>
                    <div style=""><u><b>email</b></u>: 
                        <i>
                            @if($usuario->email==null)
                                <span class="red">Sin registro</span>                
                            @else
                            {{$usuario->email}}
                            @endif                         
                        </i>
                    </div>
                    <div style=""><u><b>Rol</b></u>: <i>{{$usuario->rol->rol}}</i></div>
                    <div style=""><u><b>Añadir</b></u>: <i>
                        @if($usuario->rol->añadir==1)
                            <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                        @else
                            <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                        @endif 
                    </i></div>
                    <div style=""><u><b>Editar</b></u>: <i>
                        @if($usuario->rol->editar==1)
                            <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                        @else
                            <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                        @endif 
                    </i></div>
                    <div style=""><u><b>Eliminar</b></u>:<i>
                        @if($usuario->rol->eliminar==1)
                            <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                        @else
                            <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                        @endif 
                    </i></div>
                </label>  
            </div>
        </div>        
    </label>   
</div>