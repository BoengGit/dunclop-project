<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProduk = Produk::latest()->paginate(4);
        return view('admin.produk.produk_index', compact('dataProduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.produk_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('produk_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 343434.png
        Image::make($image)->resize(200, 200)->save('upload/produk/' . $name_gen);
        $save_url = 'upload/produk/' . $name_gen;

        Produk::insert([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'produk_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $dataProduk = $produk;
        return view('admin.produk.produk_edit', compact('dataProduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        if ($request->file('produk_image')) {

            $image = $request->file('produk_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 343434.png
            Image::make($image)->resize(200, 200)->save('upload/produk/' . $name_gen);
            $save_url = 'upload/produk/' . $name_gen;

            $produk->update([
                'nama' => $request->nama,
                'merk' => $request->merk,
                'harga' => $request->harga,
                'produk_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->route('produk.index');
        } else {

            $produk->update([
                'nama' => $request->nama,
                'merk' => $request->merk,
                'harga' => $request->harga,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->route('produk.index');
        } // end else
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $img = $produk->produk_image;
        unlink($img);
        $produk->delete();
        return response()->json(['status'=>'Berhasil menghapus produk']);
    }
}
