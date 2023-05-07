<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\User;
use Alert;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengaturan.updatepassword');
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);
        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            alert('Sukses', 'Password Berhasil Diganti', 'success');
            return redirect('/admin/updatepassword');
        }
        throw ValidationException::withMessages([
            'current_password' => 'your current password does not mact with our record',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::first();
        return view('dashboard.pengaturan.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        Request()->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Wajib diisi!!!',
            ],
        );

        $user = User::find($id);
        if (Request()->hasFile('poto')) {
            if (Storage::exists($user->poto)) {
                Storage::delete($user->poto);
            }
            $file_name = $request->poto->getClientOriginalName();
            $image = $request->poto->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'poto' => 'gambar/' . $file_name,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
