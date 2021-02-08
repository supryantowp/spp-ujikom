<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all('name', 'name');
        return view('users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $input = $request->validated();
            $input['password'] = Hash::make($request->password);
            $user = User::create($input);
            $user->assignRole($request->roles);
            alert()->success('User berhasil disimpan ke database');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        $roles = Role::pluck('name')->all();
        $userRole = $user->roles->pluck('name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required|array'
        ]);

        $input = $request->all();

        if(!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        try {
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->roles);

            alert()->success('User berhasil ditambahkan ke database');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            alert()->success('User berhasil dihapus');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }
        return redirect()->route('users.index');
    }
}
