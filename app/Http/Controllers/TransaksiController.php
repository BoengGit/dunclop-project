<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->paginate(4);
        return view('admin.transaksi.transaksi_index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get()->where('role', 0);
        $produks = Produk::all();
        return view('admin.transaksi.transaksi_create', compact('users', 'produks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->produk_id == null){
            $notification = array(
                'message' => 'Tolong masukan nama produknya',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        } else {
            $count_category = count($request->produk_id);
            for ($i=0; $i < $count_category; $i++) {
                $transaksi = new Transaksi();
                $transaksi->tanggal = date('Y-m-d', strtotime($request->tanggal[$i]));
                $transaksi->nomor_antrian = $request->nomor_antrian[$i];
                $transaksi->user_id = $request->user_id[$i];
                $transaksi->produk_id = $request->produk_id[$i];
                $transaksi->kuantitas = $request->kuantitas[$i];
                $transaksi->harga_produk = $request->harga_produk[$i];
                $transaksi->deskripsi = $request->deskripsi[$i];
                $transaksi->total_harga = $request->total_harga[$i];
                $transaksi->status = '0';
                $transaksi->save();
            }
        }

        $notification = array(
            'message' => 'Sukses di save',
            'alert-type' => 'success',
        );
        return redirect()->route('transaksi.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->back();
    }

    public function laporan()
    {
        $transaksi = Transaksi::get();
        return view('admin.transaksi.laporan.laporan_index', compact('transaksi'));
    }

}
