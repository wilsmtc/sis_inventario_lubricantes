<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    public function run()
    {
        DB::table('entidad')->insert([
            'nombre'=>'LUBRICANTES NAIN',
            'direccion'=>'Avenida Banderas',
            'telefono'=>'262-26666',
            'contacto_1'=>'61915426',
            'propietario'=>'Nain Mamani Machaca',
            'mision'=>'Realizar un servicio de lubricación automotriz y venta de productos asociados, que contribuye a preservar el cuidado del medio ambiente de futuras generaciones con un servicio transparente y responsable.',
            'vision'=>'Ser unos de los lubricantes con más prestigio del país, destacándose frente a la competencia por su innovación, trayectoria y posicionamiento en el mercado.',
            'descripcion'=>'Los motores que no pueden operar a su temperatura óptima desperdician energía y no funcionan de la mejor manera. El control del calor excesivo previene la formación de depósitos, la oxidación, la descomposición térmica y el desgaste para evitar la ineficiencia y la pérdida de rendimiento.',
            'color'=>'skin-1',
        ]);
        DB::table('roles')->insert([
            'rol'=>'Administrador',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>1
        ]);
        DB::table('roles')->insert([
            'rol'=>'Empleado',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
        ]);
        DB::table('roles')->insert([
            'rol'=>'Observador',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
        ]);
        DB::table('usuarios')->insert([
            'usuario'=>'admin',
            'password'=>bcrypt('123456'),
            'rol_id'=>1,
            'nombre'=>'Nain',
            'apellido'=>'Mamani Machaca',
            'email'=>'nain@gmail.com'
        ]);
        DB::table('usuarios')->insert([
            'usuario'=>'edison',
            'password'=>bcrypt('123456'),
            'rol_id'=>3,
            'nombre'=>'Edison',
            'apellido'=>'Perape',
            'email'=>'edison@gmail.com'
        ]);

        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Entidad',
            'url'=>'admin/entidad/#',
            'orden'=>1,
            'icono'=>'fa-plus'
        ]);
                
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Menú',
            'url'=>'admin/menu/#',
            'orden'=>2,
            'icono'=>'fa-list'
        ]);
                
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Usuario',
            'url'=>'admin/usuario/#',
            'orden'=>3,
            'icono'=>'fa-user'
        ]);
                     
                //Hijos
                DB::table('menu')->insert([
                    'menu_id'=>1,
                    'nombre'=>'Ver Entidad',
                    'url'=>'admin/entidad',
                    'orden'=>1,
                    'icono'=>'fa-asterisk'
                ]);

                DB::table('menu')->insert([
                    'menu_id'=>2,
                    'nombre'=>'Ver Menú',
                    'url'=>'admin/menu',
                    'orden'=>1,
                    'icono'=>'fa-th'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>2,
                    'nombre'=>'Menú-Rol',
                    'url'=>'admin/menu-rol',
                    'orden'=>2,
                    'icono'=>'fa-list'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>3,
                    'nombre'=>'Ver Rol',
                    'url'=>'admin/rol',
                    'orden'=>1,
                    'icono'=>'fa-list'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>3,
                    'nombre'=>'Ver Usuarios',
                    'url'=>'admin/usuario',
                    'orden'=>2,
                    'icono'=>'fa-user'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>3,
                    'nombre'=>'Ver Usuarios con Baja',
                    'url'=>'admin/usuario_inactivo',
                    'orden'=>3,
                    'icono'=>'fa-user'
                ]);
    }
}
