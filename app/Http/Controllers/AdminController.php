<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\KasusHukum;
use App\Models\FormPengajuan;
use App\Models\LBH;
use App\Models\TransaksiDonasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = FormPengajuan::select('*')->get();
        $kasusHukum = KasusHukum::join('lbh', 'lbh.id_LBH', '=', 'kasus_hukum.id_lbh')
        ->join('form_pengajuan', 'form_pengajuan.id_form', '=', 'kasus_hukum.id_form')
        ->select('*')->get();
        $donasi = TransaksiDonasi::select('*')->get();
        $lbh = LBH::select('*')->get();

        return view('admin.dashboard', compact('pengajuan', 'kasusHukum','donasi', 'lbh'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function donation()
    {
        // Halaman Donasi
        $cases = KasusHukum::all();
        $countWeeklyTransactions = 0;
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $biggestDonation = TransaksiDonasi::all()->sortByDesc('nominal')->first();

        foreach ($cases as $case) {
            foreach ($case->approvedTransactions as $transaction) {
                if ($transaction->created_at >= $startOfWeek && $transaction->created_at <= $endOfWeek) {
                    $countWeeklyTransactions++;
                }
            }
        }
        return view('admin.donasi', compact('cases', 'countWeeklyTransactions', 'biggestDonation'));
    }

    public function donation_detail($id){
        $data = KasusHukum::join('form_pengajuan', 'kasus_hukum.id_form', '=', 'form_pengajuan.id_form')
        ->join('lbh', 'lbh.id_LBH', '=', 'kasus_hukum.id_lbh')->select('*')
        ->where('kasus_hukum.id_kasus', '=', $id)->first();

        $donation = TransaksiDonasi::join('kasus_hukum', 'kasus_hukum.id_kasus', '=', 'transaksi_donasi.id_kasus_hukum')
        ->join('bank', 'transaksi_donasi.id_bank', '=', 'bank.id_bank')
        ->select('transaksi_donasi.*', 'bank.nama as nama_bank', 'kasus_hukum.*')
        ->where('kasus_hukum.id_kasus', '=', $id)->get();
        $kasusHukum = KasusHukum::find($id);
        $total = 0;
        foreach ($donation as $d){
            $total+= $d->nominal;
        }
        return view('admin.donasi-detail', compact('data', 'donation', 'total', 'kasusHukum'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adminRole()
    {
        // Halaman Role Admin
        $lbh = LBH::all();
        $admins = Admin::all();

        return view('admin.role-admin', compact('lbh', 'admins'));
    }

    public function adminCreate()
    {
        $lbh = LBH::all();
        $admins = Admin::all();

        return view('admin.role-addadmin', compact('lbh', 'admins'));
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.admin-role');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function lbhRole()
    {
        // Halaman Role LBH
        $lbh = LBH::all();
        $admins = Admin::all();

        return view('admin.role-userlbh', compact('lbh', 'admins'));
    }

    public function lbhCreate()
    {
        // Halaman Tambah LBH
        $lbh = LBH::all();
        $admins = Admin::all();

        return view('admin.role-adduserlbh', compact('lbh', 'admins'));
    }

    public function lbhStore(Request $request)
    {
        // Tambah LBH
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        LBH::create([
            'nama_lbh' => 'LBH ' . $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->telepon,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.lbh-role');
    }


    public function pengajuan_perkara(){
        $cases = FormPengajuan::orderBy('id_form', 'asc')->get();
        $belumVerifikasi = FormPengajuan::whereNull('form_pengajuan.jenis_perkara')->get();
        $verifikasi = FormPengajuan::whereNotNull('form_pengajuan.jenis_perkara')->get();
        return view('admin.perkara-pengajuan', compact('cases', 'belumVerifikasi', 'verifikasi'));
    }

    public function detail_pengajuan_perkara($id){
        $perkara = FormPengajuan::select('*')->where('form_pengajuan.id_form', '=', $id)->first();
        return view('admin.perkara-pengajuan-detail', ['perkara'=>$perkara]);
    }

    public function perkara_berlangsung(){
        $cases = KasusHukum::all();
        return view('admin.perkara-berlangsung', compact('cases'));
    }

    public function detail_perkara_berlangsung($id){
        $case = KasusHukum::join('form_pengajuan', 'form_pengajuan.id_form', '=', 'kasus_hukum.id_form')
        ->select('*')->where('kasus_hukum.id_form', $id)->get();
        return view('admin.perkara-berita', compact('case'));
    }

    public function detail_perkara_berlangsung_create(Request $request){
        $rules = [
            "title" => "required",
            "description" => "required",
            "image" => "required|mimes:jpg,png,jpeg,gif|max:2048"
        ];

        $message = ["required" => ":attribute wajib diisi!", 
        "min" => ":attribute minimal berisi :min karakter!",
        "max" => ":attribute maksimal berisi :max karakter",
        "fileLampiran.mimes" => "file harus berupa gambar dengan format jpg, png, jpeg, atau gif",
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator)->with('danger', 'Pastikan semua field diisi');
        }else{
            $image = $request->file('image_url');
            $image_url = time().".".$image->getClientOriginalExtension();
            $path_image_url = Storage::disk('public')->putFileAs('image', $image, $image_url);

            KasusHukum::create([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $request->image
            ]);
            
            return redirect()->route('admin.perkara-berlangsung')->with('success', "Tambah berita berhasil!");
        }
    }

    public function terima_pengajuan(Request $request, $id) {
        $formPengajuan = FormPengajuan::find($id);

        $formPengajuan->update([
            'jenis_perkara' => $request->jenis_perkara,
        ]);

        KasusHukum::create([
            'tanggal' => Carbon::now(),
            'id_form' => $id,
            'target_donasi' => $formPengajuan->target_donasi,
            'status_pengajuan' => 'Proses',
        ]);

        return redirect('admin/pengajuan-perkara');
    }

    public function update_perkara_berlangsung(Request $request, $id) {
        $kasusHukum = KasusHukum::find($id);

        if (!Storage::disk('public')->exists('kasus_hukum')) {
            Storage::disk('public')->makeDirectory('kasus_hukum');
        }
        // return $kasusHukum;

        $image = $request->file('image_url');
        $imagePath = Storage::disk('public')->putFileAs('kasus_hukum', $image, $image->getClientOriginalName());

        $kasusHukum->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $imagePath, // Use the new image URL
        ]);

        return redirect('admin/perkara-berlangsung');
    }
}
