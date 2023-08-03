<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\HargaSampah;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function dashboard()
    //{
    //    return view('admin.layout.dashboard-layout');
    //}

    public function index1()
    {
        return view('home');
    }

    public function index()
    {
        $results = DB::table('harga_sampahs')->get();
        $data = [
            "title" => "Hello World",
            "results" => $results,
            "length" => sizeOf($results)
        ];

        return view('admin.layout.home-content', $data);
    }

    public function riwayat_transaksi()
    {
        $results = DB::table('transaksis')->select('transaksis.created_at', 'transaksis.nama_nasabah', 'harga_sampahs.jenis_sampah','transaksis.status')->join('harga_sampahs', 'harga_sampahs.id', '=', 'transaksis.jenis_sampah_id')->get();
        $data = [
            "results" => $results,
            "length" => sizeOf($results)
        ];

        return view('admin.layout.transaksi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function datawarga()
     {
        $data=[];
        $data['warga'] = Warga::all();
         return view('admin.layout.datawarga-layout',$data);
     }

    public function create()
    {
        return view('admin.layout.insert-data');
    }

    //public function simpan(Request $request)
    //{
     //   $warga = new Warga();
     //   $warga->nama = $request->input('nama');
     //   $warga->email = $request->input('email');
     //   $warga->alamat = $request->input('alamat');
     //   $warga->save();

      //  return redirect()->back()->with('success', 'Data warga berhasil ditambahkan');
    //}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warga = new Warga();
        $warga->nama = $request->get('nama');
        $warga->email = $request->get('email');
        $warga->alamat = $request->get('alamat');
        $warga->save();

        if($warga){
            return redirect()->route('warga.data')->with(['success'=> 'Data warga berhasil ditambahkan']);

        } else{
            return redirect()->route('warga.data')->with(['error'=> 'Data warga gagal disimpan']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        //$warga = Warga::find(Request $request, $id)
        //dd($warga);
        //return view('admin.layout.datawarga-layout', compact(['warga']));
        $warga = Warga::where('id',$request->id)->first();
        return view('admin.layout.datawarga-layout', compact('warga'));
    }


    public function ubah($id)
    {
        //
        $warga = Warga::find($id);
        dd($warga);
        return view('admin.layout.edit', compact(['warga']));
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
        //
        $warga = Warga::find($id);
        $warga->nama = $request->get('nama');
        $warga->email = $request->get('email');
        $warga->alamat = $request->get('alamat');
        $warga->save();

        if($warga){
            return redirect()->route('warga.data')->with(['success'=> 'Data warga berhasil diubah']);

        } else{
            return redirect()->route('warga.data')->with(['error'=> 'Data warga gagal disimpan']);
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
        //
        $data=[];
        $data = Warga::where('id',$id)-> delete();

        if($data){
            return redirect()->route('warga.data')->with(['success'=> 'Data warga berhasil dihapus']);

        } else{
            return redirect()->route('warga.data')->with(['error'=> 'Data warga gagal dihapus']);
        }
    }
}
