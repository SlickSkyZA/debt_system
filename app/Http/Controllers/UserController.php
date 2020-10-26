<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);
        $data = $request->except('_token');
        try {
            $path = $request->file('photo')->store('public/users');
            $path = str_replace('public', 'storage', $path);
            $data['photo'] = $path;
            $data['password'] = Hash::make($request->password);
            User::create($data);
            return redirect()->route('users.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('danger', 'Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('user.edit', \compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('user.edit', \compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = $request->file('photo');
        $data  = $request->except('_token', '_method');
        if ($photo) {
            $path = $request->file('photo')->store('public/users');
            $path = str_replace('public', 'storage', $path);
            $data['photo'] = $path;
        }
        try {
            User::where('id', $id)->update($data);
            return redirect()->route('users.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('danger', 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);
            return redirect()->route('users.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('danger', 'Error');
        }
    }

    public function reset_password(Request $request, int $id)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);
        $data  = $request->except('_token', '_method', 'password_confirmation');
        $data['password'] = Hash::make($request->password);
        try {
            User::where('id', $id)->update($data);
            return redirect()->route('users.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('danger', 'Error');
        }
    }
}
