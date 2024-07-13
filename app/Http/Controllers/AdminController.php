<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\KasusHukum;
use App\Models\LBH;
use App\Models\TransaksiDonasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dashboard

        return view('admin.dashboard');
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

    /**
     * Display the specified resource.
     */
    public function log()
    {
        // Halaman Log

        return view('admin.log');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function submission()
    {
        // Halaman Pengajuan

        return view('admin.perkara-pengajuan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function activeCases()
    {
        // Halaman Pengajuan
        $cases = KasusHukum::all();

        return view('admin.perkara-berlangsung', compact('cases'));
    }
}