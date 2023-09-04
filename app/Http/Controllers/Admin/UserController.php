<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.destroy')->only('destroy');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = User::where('email', $request->email)->first();

        if ($email == null || empty($email)) {
            $user = new User();

            $user->name = $request->name;
            $user->apellidoP = $request->apellidoP;
            $user->apellidoM = $request->apellidoM;
            $user->cedula = $request->cedula;
            $user->fecha_contratacion = $request->fecha_contratacion;
            $user->email = $request->email;
            $user->password = bcrypt($request->password); // Se encripta la contraseña usando la función bcrypt().
            $user->save(); // Se guarda el registro en la base de datos.

            $roles = Role::all();

            return redirect()->route('admin.users.edit', compact('user', 'roles'))->with('info', 'El usuario se creó con éxito!!');
        } else {
            return redirect()->route('admin.users.create')->with('war', 'El correo ya existe, ingrese un correo diferente');
        }
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asignaron los roles correctamente!!');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index', $user)->with('info', 'ok');
    }
}
