<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        if (request()->expectsJson()) {
            return response()->json($users);
        }

        return view('userlist', ['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('creautenteadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
            'dateofbirth' => 'required|date',
        ]);

        $user = new User([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'city' => $validatedData['city'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), 
            'dateofbirth' => $validatedData['dateofbirth'],
        ]);

        $user->save();
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('userdettaglio', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('edituseradmin', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'dateofbirth' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'exists:roles,id'], 
        ]);


        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'city' => $request->city,
            'dateofbirth' => $request->dateofbirth,
            'email' => $request->email,
            'role_id' => $request->role,
        ]);


        return redirect()->route('user.show', $user->id)->with('success', 'Profilo aggiornato con successo.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->destroy($user->id);

        return redirect()->route('user.index');
    }
}
