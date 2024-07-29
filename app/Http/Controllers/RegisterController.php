<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\View\View;


class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => "Register"
        ]);
    }
    public function store(Request $request) {
        $validate = $request->validate([
            "name" => 'required|max:255',
            "username" => 'required|max:255|min:3|unique:users',
            "email" => 'required|email:dns|unique:users',
            "password" => 'required|min:5|max:255'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        $request->session()->flash('success', 'Registration Successfull! Please Login!');

        return redirect('/login')->with('success', 'Registration Successfull! Please Login!');
    }
}
