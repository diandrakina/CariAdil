<?php

namespace App\Http\Controllers;

use App\Models\LBH;
use App\Models\ProgressKasusHukum;
use App\Models\TransaksiDonasi;
use Illuminate\Http\Request;
use App\Models\KasusHukum;
use Laravel\Prompts\Progress;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasusHukum = KasusHukum::orderBy('tanggal', 'DESC')->get();
        $auth = false;

        $total = array();
        foreach ($kasusHukum as $kasus) {
            # code...
            // $transaksi = TransaksiDonasi::select('*')->where('id_kasus_hukum', '=', $kasus->id_kasus)->get();
            // $totalEach = 0;
            // foreach ($transaksi as $trans){
            //     $totalEach += $trans->nominal;
            // }

            $transaksi = TransaksiDonasi::where('id_kasus_hukum', $kasus->id_kasus)->sum('nominal');
            $data = [
                "id_kasus" => $kasus->id_kasus,
                "title" => $kasus->title,
                    "description" => $kasus->description,
                    "tanggal" => $kasus->tanggal,
                    "target_donasi" => $kasus->target_donasi,
                    "id_bank" => $kasus->id_bank,
                    "id_form" => $kasus->id_form,
                    "id_lbh" => $kasus->id_lbh,
                    "jenis_perkara" => $kasus->jenis_perkara,
                    "status_pengajuan" => $kasus->status_pengajuan,
                    "image_url" => $kasus->image_url,
                    "created_at" => $kasus->created_at,
                    "updated_at" => $kasus->updated_at,
                    "total" => $transaksi,
                    "nama_lbh" => LBH::select('nama_lbh')->where('id_lbh', '=', $kasus->id_lbh)->get()
                ];
                array_push($total, $data);
            }

        $finalKasus = array();

        // $kasusHukum

        // dd($data);

        return view('user.berita', ['list_kasus_hukum' => $total, 'auth' => $auth]);
    }

    public function detail_berita(){
        $auth = false;
        return view('user.detail_berita', ['auth' => $auth]);
    }
    public function showLBH(){
        $auth = true;
        return view('userLBH.perkara_berlangsung', ['auth' => $auth]);
    }

    public function PP(){
        $auth = true;
        return view('userLBH.detail_perkara_berlangsung', ['auth'=> $auth]);
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
    public function show(string $id)
    {
        $kasusHukum = KasusHukum::find($id);
        $progress = ProgressKasusHukum::select('*')->where('id_kasus', '=', $id)->get();
        $transaksi = TransaksiDonasi::select('*')->where('id_kasus_hukum', '=', $id)->get();
        $total = 0;
        foreach ($transaksi as $trans){
            $total += $trans->nominal;
        }
        $auth = false;
        // dd($total);
        return view('user.detail_berita', ['kasusHukum' => $kasusHukum, 'auth' => $auth, 'progress' => $progress, 'total' => $total]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
