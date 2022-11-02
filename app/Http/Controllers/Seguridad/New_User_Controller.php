<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUsuario;
use App\Models\Admin\Rol;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;

class New_User_Controller extends Controller
{

    public function index_nuevo()
    {
        $rols = Rol::orderBy('id')->pluck('rol', 'id')->toArray();
        return view('new_user.form', compact('rols'));
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(ValidacionUsuario $request)
    {
        $request->request->add(['estado' => 2]);
        if($foto=Usuario::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        //dd($request->all());
        Usuario::create($request->all());
        return redirect('seguridad/login')->with('mensaje','solicitud enviada con exito, espere a que su cuenta sea aprobada');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
