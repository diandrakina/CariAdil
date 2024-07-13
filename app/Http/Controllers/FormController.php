<?php

namespace App\Http\Controllers;

use App\Models\FormPengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{

    public function index()
    {
        $auth = false;
        $noPemohon = 'CA-' . str_pad(FormPengajuan::count() + 1, 3, '0', STR_PAD_LEFT);

        return view('user.form', ['auth' => $auth, 'noPemohon' => $noPemohon]);
    }

    public function pengajuan_bantuan()
    {
        $pengajuanBantuan = FormPengajuan::whereNULL('id_lbh')->orderBy('tanggal', 'DESC')
        // ->join('kasus_hukum', 'form_pengajuan.id_form', '=', 'kasus_hukum.id_form')
        ->select('*')->get();
        // ->select('form_pengajuan.*', 'kasus_hukum.jenis_perkara')->get();
        $auth = true;

        return view('userLBH.pengajuan_perkara', ['pengajuan_bantuan' => $pengajuanBantuan, 'auth' => $auth]);
    }

    public function detail_pengajuan_bantuan($id)
    {
        // $pengajuanBantuan = FormPengajuan::join('kasus_hukum', 'form_pengajuan.id_form', '=', 'kasus_hukum.id_form')
        // ->select('form_pengajuan.*', 'kasus_hukum.jenis_perkara')
        // ->where('form_pengajuan.id_form', $id)->get();
        $pengajuanBantuan = FormPengajuan::select('*')
        ->where('id_form', '=', $id)->first();
        
        $auth = true;
        return view('userLBH.detail_pengajuan_perkara', ['auth' => $auth, 'pengajuanBantuan' => $pengajuanBantuan]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DB::beginTransaction();

        try {
            if ($request->hasFile('image_url')) {
                $imagePath = $request->file('image_url')->store('public');
            }

            FormPengajuan::create([
                'nomor_pemohon' => $request->nomor_pemohon,
                'nama' => $request->nama,
                'nama_panggilan' => $request->nama_panggilan,
                'tempat_lahir' => $request->tempat_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'jumlah_anak' => strval($request->jumlah_anak),
                'jumlah_anak_tanggungan' => strval($request->jumlah_anak_tanggungan),
                'alamat_lengkap' => $request->alamat_lengkap,
                'rt_rw' => $request->RT_RW,
                'desa_kelurahan' => $request->Desa_Kelurahan,
                'kabupaten_kota' => $request->Kabupaten_Kota,
                'kode_pos' => $request->kode_pos,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'identitas_diri' => $request->identitas_diri,
                'nomor_identitas' => $request->nomor_identitas,
                'keterangan_tidak_mampu' => $request->keterangan_tidak_mampu,
                'nomor_keterangan_tidak_mampu' => $request->nomor_keterangan_tidak_mampu,
                'pekerjaan' => $request->pekerjaan,
                'jumlah_tanggungan' => strval($request->jumlah_tanggungan),
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'telepon' => $request->telepon,
                'hp' => $request->HP,
                'uraian' => $request->uraian,
                'lokasi_pembuatan_form' => $request->lokasi_pembuatan_form,
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'image_url' => $imagePath,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengajukan form');
        }

        return redirect()->route('loading');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    public function terima_pengajuan(Request $request)
    {
        $request->validate([
            'id_form' => 'required|integer|exists:form_pengajuan,id_form',
        ]);
        
        $formPengajuan = FormPengajuan::find($request->id_form);
        $user = Session::get('user');
        $formPengajuan->id_LBH = $user->id_LBH;
        //     // $formPengajuan->id_LBH = Auth::user()->id_LBH;
        $formPengajuan->save();

        return redirect()->back();
    
        // dd($formPengajuan);

        // return response()->json(['success' => true, 'message' => 'id_LBH updated successfully']);

        // $request->validate([
        //     'id_form' => 'required|integer|exists:form_pengajuan,id_form',
        // ]);
        
        // $formPengajuan = FormPengajuan::find($request->id_form);
        
        
        // if ($formPengajuan) {
        //     $formPengajuan->id_LBH = auth()->user()->id_LBH;
        //     $formPengajuan->save();
            
        //     return response()->json(['success' => true, 'message' => 'id_LBH updated successfully']);
        // }
    
        // return response()->json(['success' => false, 'message' => 'Form not found']);
    }
}
