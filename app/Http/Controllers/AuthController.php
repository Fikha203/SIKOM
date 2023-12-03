<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Storage};

class AuthController extends Controller
{
    public function index()
    {
        return view("auth.login", ["title" => "Masuk"]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required"],
            "password" => ["required"],
        ]);

        if (Auth::attempt(["email" => $credentials["email"], "password" => $credentials['password']])) {
            $request->session()->regenerate();

            // return redirect()->intended('/dashboard')->with("success", "Login berhasil!");
            return redirect()->intended('/dashboard')->with("toast_success", "Login berhasil!");
        }

        return redirect('/login')->with("error", 'Login gagal :(');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/")->with("toast_success", "Logout berhasil!");
    }

    public function indexRegister()
    {
        return view("auth.register", ["title" => "Daftar"]);
    }
    public function register(Request $request)
    {

        $credentials = $request->validate([
            "name" => ["required", "max:255"],
            "email" => ["required", "unique:users,email", "email:rfc,dns"],
            "level" => ['required'],
            
            'password' => ['required', 'confirmed', 'min:6'],
            'password_confirmation' => ['required', 'min:6', "required_with:password", "same:password"],
        ]);

        $credentials_mahasiswa = $request->validate([
            "nim" => ["numeric", "unique:mahasiswas,nim"],
            "prodi" => ['required'],
            "angkatan" => ['required'],
        ]);

        // Encrypt password
        $credentials["password"] = Hash::make($credentials["password"]);

        // Image
        // if ($request->file("image")) {
        //     // Store original image
        //     $imageOriginalPath = $request->file('image')->store("user-images");

        //     // Set path
        //     $credentials["image"] = $imageOriginalPath;

        //     // Open image using Intervention Image
        //     $imageCrop = Image::make("storage/" . $imageOriginalPath);

        //     // Crop the image to a square with a width of 300 pixels
        //     $imageCrop->fit(1200, 1200, function ($constraint) {
        //         $constraint->upsize();
        //     }, "top");

        //     // Replace original image with cropped image
        //     Storage::put($imageOriginalPath, $imageCrop->stream());
        // } 

        // try {
            $user = User::create($credentials);
            $user->mahasiswa()->update($credentials_mahasiswa);
            return redirect("/login")->with('toast_success', 'Registrasi berhasil silahkan login');
        // } catch (\Exception $e) {
        //     return redirect('/register')->withErrors($e->getMassage());
        // }
    }



}
