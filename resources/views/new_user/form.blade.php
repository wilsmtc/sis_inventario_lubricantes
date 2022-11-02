
<head>
    <link rel="stylesheet" href="{{asset("assets/$theme/assets/css/bootstrap.min.css")}}" /> 
    @yield("styles")
        <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
        <script src="{{asset("assets/$theme/assets/js/jquery-2.1.4.min.js")}}"></script>       
        <script src="{{asset("assets/$theme/assets/js/jquery.validate.min.js")}}"></script>
        <script src="{{asset("assets/$theme/assets/js/messages_es.min.js")}}"></script> 
        <script src="{{asset("assets/js/funciones.js")}}"></script>
    <link href="{{asset("assets/js/bootstrap-fileinput-master/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset("assets/js/bootstrap-fileinput-master/js/fileinput.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/usuario/validar.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput-master/js/locales/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput-master/themes/fas/theme.min.js")}}" type="text/javascript"></script>
</head>	<br>
<body style="background-color: rgb(158, 211, 169); center" >
    @include('mensajes.error')
    <div class="col-lg-12">
        <h3 style="text-align: center; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-color:blue">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Formulario de creación de nuevo Usuario &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn-dark"  style="border-radius: 40%"  onclick="location.href='{{route('login')}}'">Volver</button>
        </h3><br>
    </div>
    <form class="form-horizontal" action="{{route ('guardar_new_user')}}" id="form-general" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Usuario </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" minlength="3" maxlength="30" placeholder="Ingrese Usuario"  id="usuario" name="usuario" value="{{old('usuario', $usuario->usuario ?? '')}}" required />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Ingrese Nombre"  id="nombre" name="nombre" value="{{old('nombre', $usuario->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Apellido </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Ingrese Apellido"  id="apellido" name="apellido" value="{{old('apellido', $usuario->apellido ?? '')}}" required onkeyup="ApellidoMayus()"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Correo Electrónico </label>
            <div class="col-sm-4">
                <input type="email" class="form-control" minlength="10" maxlength="50" placeholder="Ejm:juan@gmail.com"  id="email" name="email" value="{{old('email', $usuario->email ?? '')}}" />
            </div>
        </div>
        <div class="form-group">
            <label for="rol_id" class="col-lg-4 control-label requerido">Rol</label>
            <div class="col-lg-4">
                <select name="rol_id" id="rol_id" class="form-control" required>
                    <option value="">Seleccione el Rol</option>
                    @foreach($rols as $id => $rol)
                        <option
                            value="{{$id}}"{{old("rol_id",$usuario->rol->id ?? "")==$id ? "selected":""}}>{{$rol}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right requerido" for="password">Contraseña</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" minlength="5" maxlength="30" placeholder="****" {{!isset($usuario) ? 'required' : ''}} id="password" name="password" autocomplete="on" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right requerido" for="re_password">Repita Contraseña</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" placeholder="****" {{!isset($usuario) ? 'required' : ''}} id="re_password" name="re_password" autocomplete="on" />
            </div>
        </div>
        <div class="form-group">
            <label for="foto" class="col-lg-4 control-label">Foto</label>
            <div class="col-lg-4">
                <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($usuario->foto) ? Storage::url("datos/fotos/usuario/$usuario->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+de+usuario"}}" accept="image/*"/>
            </div>
        </div>
        <div class="form-group" style="text-align: center">
            <button class="btn btn-primary"  style="border-radius: 40%" type="submit">Solicitar</button>
        </div>
    </form>
</body>  

<script>
    var nombre = document.getElementById('nombre');  //instanciamos el elemento input
        function NombreMayus() {            //función que capitaliza la primera letra
        var palabra = nombre.value;                    //almacenamos el valor del input
        if(!nombre.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1);
        }
        nombre.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>
<script>
    var apellido = document.getElementById('apellido');  //instanciamos el elemento input
        function ApellidoMayus() {            //función que capitaliza la primera letra
        var palabra = apellido.value;                    //almacenamos el valor del input
        if(!apellido.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1);
        }
        apellido.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>