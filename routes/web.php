<?php

use Illuminate\Support\Facades\Route;

//Route::get('/new_user', 'UsuarioController@index_nuevo')->name('new_user');
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::get('seguridad/new_user', 'Seguridad\New_User_Controller@index_nuevo')->name('new_user');
Route::post('seguridad/new_user', 'Seguridad\New_User_Controller@store') ->name('guardar_new_user');
        //grupo de rutas para el admin
Route ::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware'=> 'auth'], function(){
    Route::get('/', 'InicioController@index')->name('inicio');
    Route ::group(['middleware'=> 'permisoadmin'], function(){
            //rutas del rol
            Route::get('rol', 'RolController@index') ->name('rol');
            Route::get('rol/crear', 'RolController@create') ->name('crear_rol')->middleware('permisocrear');
            Route::get('rol/{id}/editar', 'RolController@edit') ->name('editar_rol')->middleware('permisoeditar');
            Route::post('rol', 'RolController@store') ->name('guardar_rol');
            Route::put('rol/{id}', 'RolController@update') ->name('actualizar_rol');
            Route::delete('rol/{id}', 'RolController@destroy')->name('eliminar_rol')->middleware('permisoeliminar');
            //rutas de Usuarios
            Route::get('usuario', 'UsuarioController@index') ->name('usuario');
            Route::get('usuario/crear', 'UsuarioController@create') ->name('crear_usuario')->middleware('permisocrear');         
            Route::post('usuario', 'UsuarioController@store') ->name('guardar_usuario');
            Route::get('usuario/{id}/editar', 'UsuarioController@edit') ->name('editar_usuario')->middleware('permisoeditar');         
            Route::delete('usuario/{id}', 'UsuarioController@destroy')->name('eliminar_usuario')->middleware('permisoeliminar');
            Route::put('usuario/{id}', 'UsuarioController@update') ->name('actualizar_usuario');
            Route::post('usuario/{usuario}', 'UsuarioController@ver')->name('ver_usuario');
            Route::get('usuario_inactivo', 'UsuarioController@index_inactivo') ->name('usuario_inactivo');
            Route::put('usuario/{id}/inactivar', 'UsuarioController@inactivar') ->name('inactivar_usuario')->middleware('permisoeditar');
            Route::put('usuario/{id}/activar', 'UsuarioController@activar') ->name('activar_usuario')->middleware('permisoeditar');
            Route::get('usuario/{id}/aceptar', 'UsuarioController@aceptar') ->name('aceptar_usuario');         
            Route::get('usuario/{id}/rechazar', 'UsuarioController@rechazar') ->name('rechazar_usuario');
            //rutas del menu
            Route::get('menu', 'MenuController@index') ->name('menu');
            Route::get('menu/crear', 'MenuController@create') ->name('crear_menu')->middleware('permisocrear');
            Route::get('menu/{id}/editar', 'MenuController@edit') ->name('editar_menu')->middleware('permisoeditar');
            Route::post('menu', 'MenuController@store') ->name('guardar_menu');
            Route::put('menu/{id}', 'MenuController@update') ->name('actualizar_menu');
            Route::get('menu/{id}/eliminar', 'MenuController@destroy') ->name('eliminar_menu')->middleware('permisoeliminar');
            Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar-orden');
            //rutas del menu-rol
            Route::get('menu-rol', 'MenuRolController@index') ->name('menu_rol');
            Route::post('menu-rol', 'MenuRolController@store') ->name('guardar_menu_rol');
            //rutas de entidad
            Route::get('entidad', 'entidadController@index') ->name('entidad');
            Route::get('entidad/{id}/editar', 'entidadController@edit') ->name('editar_entidad')->middleware('permisoeditar');
            Route::put('entidad/{id}', 'entidadController@update') ->name('actualizar_entidad');
    });
    //ruta para editar el usuario
    Route::get('usuario/{id}/editar_usuario', 'UsuarioController@edit_user') ->name('editar_mi_usuario');
    Route::put('usuario/{id}/editar_usuario', 'UsuarioController@update_user') ->name('actualizar_mi_usuario');

});
