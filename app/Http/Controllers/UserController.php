<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $input = $req->all();

        $input['password'] = Hash::make($req->password);
        if ($req->foto) {
            $name = $req->file('foto')->getClientOriginalName();

            $req->file('foto')->storeAs('public/user', $name);
            $input['foto'] = $name;
        }
        $data = User::create($input);

        return redirect()->route('admin.user.index')->withSuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $req)
    {
        $input = $req->except('password', 'foto');

        if ($req->password) {
            $input['password'] = Hash::make($req->password);
        }
        if ($req->foto) {
            $name = $req->file('foto')->getClientOriginalName();

            $req->file('foto')->store('public/user');
            $input['foto'] = $name;
        }

        $user->update($input);
        return redirect()->route('admin.user.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            // return notify()->warning($exception->getMessage());
            return back()->withWarning($exception->getMessage());
        }
    }
}
