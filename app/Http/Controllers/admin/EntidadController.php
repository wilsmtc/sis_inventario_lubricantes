<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionEntidad;
use App\Models\Admin\Entidad;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    public function index()
    {
        $datos = Entidad::findOrfail(1);
        return view('admin.entidad.index',compact('datos'));
    }

    public function edit($id)
    {
        $entidad = Entidad::findOrFail($id);
        //dd($unidad);
        return view('admin.entidad.editar', compact('entidad'));
    }
    
    public function update(ValidacionEntidad $request, $id)
    {
        $Entidad = Entidad::findOrFail($id);
        if ($foto = Entidad::setFoto($request->foto_up, $Entidad->foto))
            $request->request->add(['foto' => $foto]);
        if ($logo = Entidad::setLogo($request->logo_up, $Entidad->logo))
            $request->request->add(['logo' => $logo]);
        $Entidad->update($request->all());
        return redirect('admin/entidad')->with('mensaje', 'Datos actualizados con exito');
    }
}
