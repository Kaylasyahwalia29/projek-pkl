<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\keranjang;
use App\Models\produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{

    public function index()
    {
        $keranjang = keranjang::all();
        $produk = produk::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.keranjang.index', compact('keranjang', 'produk'));
    }

    public function create()
    {
        $keranjang = keranjang::all();
        $produk = produk::all();
        return view('admin.keranjang.create', compact('keranjang', 'produk'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => 'required',
            'id_produk' => 'required',
        ]);

        $keranjang = new keranjang();
        $keranjang->jumlah = $request->jumlah;
        $keranjang->id_produk = $request->id_produk;

        $keranjang->save();
        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('keranjang.index');

    }

    public function show(keranjang $keranjang)
    {

    }

    public function edit($id)
    {
        $keranjang = keranjang::findOrFail($id);
        $produk = produk::all();
        return view('admin.keranjang.edit', compact('keranjang', 'produk'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jumlah' => 'required',
            'id_produk' => 'required',
        ]);

        $keranjang = keranjang::findOrFail($id);
        $keranjang->jumlah = $request->jumlah;
        $keranjang->id_produk = $request->id_produk;

        $keranjang->save();
        Alert::success('Success', 'Data Berhasil Di Ubah')->autoClose(1000);
        return redirect()->route('keranjang.index');

    }

    public function destroy($id)
    {
        $keranjang = keranjang::findOrFail($id);
        $keranjang->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('keranjang.index');

    }
    
}
