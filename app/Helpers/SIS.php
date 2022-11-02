<?php
use App\Models\Admin\Entidad;
use App\Models\Admin\Usuario;

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}
class MyHelper {
    public static function Datos_Clinica(){
        $clinica = Entidad::findOrfail(1);
        return $clinica;
    }
    public static function Usuarios_Pendientes(){
        $usuarios = Usuario::where('estado',2)->get();
        return $usuarios;
    }
}