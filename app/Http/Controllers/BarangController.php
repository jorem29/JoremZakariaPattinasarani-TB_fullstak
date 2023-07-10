<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('frontend.barang.index');
    }

    public function tambah()
    {
        return view('frontend.barang.create');
    }

    public function edit()
    {
        return view('frontend.barang.edit');
    }

    public function indexOutlet()
    {
        return view ('frontend.outlet.index');
    }

    public function editOutlet()
    {
        return view ('frontend.outlet.edit');
    }

    public function tambahOutlet()
    {
        return view ('frontend.outlet.create');
    }

    public function survey()
    {
        return view ('frontend.survey.index');
    }
}
