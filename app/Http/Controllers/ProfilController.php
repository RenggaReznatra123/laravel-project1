<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('beranda');
    }

    public function profil()
    {
        
        $data = [
            'nama' => 'Rengga Reznatra yes',
            'kelas' => 'XI PPLG 2',
            'sekolah' => 'SMK Raden Umar Said'
        ];
        return view('profil',$data,['title' => "profile"]);
    }

    public function kontak()
    {
        return view('kontak',['title' => "contact"]);
    }

     public function home()
    {
        return view('home', ['title' => "home"]);
    }
}
