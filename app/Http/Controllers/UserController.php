<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {
        //
        $previousUrl = $request->headers->get('referer');

        return view("users.show", [
            "user" => $user,
            "previousUrl" => $previousUrl,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        $previousUrl = $request->headers->get('referer');

        return view("users.edit", [
            "title" => "Sunting pengguna " . $user->name,
            "user" => $user,
            "previousUrl" => $previousUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $rules = [
            "name" => ["required", "max:255"],
        ];

        $credentials = $request->validate($rules);

        if ($request->email != $user->email) {
            $rules["email"] = ["required", "unique:users,email", "email:rfc,dns"];
        }

        try {

            $user->update($credentials);

            if($user->level == 'mahasiswa'){
                $credentials2 = $request->validate([
                    "nim" => ["required", "numeric"],
                    "angkatan" => ["required"],
                    "prodi" => ["required"],
                ]);
                $user->mahasiswa->update($credentials2);

            } else {
                $credentials2 = $request->validate([
                    "nip" => ["numeric"],
                ]);
                $user->staff>update($credentials2);
            }
            



            return redirect('/users/' . $user->id)->with('success', "Pengguna berhasil di-edit!");
        } catch (\Exception $e) {
            // If something was wrong ...
            return back()->withErrors("Pengguna gagal di-edit.");
        }

        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
