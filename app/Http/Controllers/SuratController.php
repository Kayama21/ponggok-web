<?php

namespace App\Http\Controllers;

use App\Mail\TestingMail;
use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{

    // Page Dashboard
    public function index()
    {
        $total = Surat::count();
        $proses = Surat::whereIn('statusSurat', [0, 1, 2])->count();
        $selesai = Surat::where('statusSurat', 3)->count();
        $gagal = Surat::where('statusSurat', 4)->count();

        return view('dashboard', ['total' => $total, 'proses' => $proses, 'selesai' => $selesai, 'gagal' => $gagal]);
    }

    // Page list surat ajuan
    public function listAjuan()
    {

        return view('ajuan');
    }

    // Ambil data surat dan mengembalikan dalam bentuk JSON untuk Datatables
    public function tableAjuan()
    {

        if (auth()->user()->role === 'admin') {
            $ajuan = Surat::whereIn('statusSurat', [0, 2])->get();
        } else {
            $ajuan = Surat::where('statusSurat', 1)->get();
        }

        $response = [
            'data' => $ajuan,
        ];

        return response()->json($response);
    }

    // Page Verifikasi
    public function verifikasi($ajuan_id)
    {

        $ajuan = Surat::find($ajuan_id);

        return view('verifikasi', ['verifikasi' => $ajuan]);
    }

    // Proses verifikasi
    public function verifiedAjuan(Request $request)
    {
        $ajuan = Surat::find($request->id_ajuan);
        $ajuan->statusSurat = '1';
        $ajuan->save();

        return redirect('./ajuan');
    }

    // Page Signature Lurah
    public function signaturePage($ajuan_id)
    {
        $ajuan = Surat::find($ajuan_id);

        // dd($ajuan);
        return view('signature', ['signature' => $ajuan]);
    }

    //Menampilkan bentuk PDF Berkas
    public function showSignedPDF($ajuan_id)
    {
        $ajuan = Surat::find($ajuan_id);

        $data = [
            'kategoriSurat' => $ajuan->kategoriSurat,
            'namaPengaju' => $ajuan->namaPengaju,
            'nik' => $ajuan->nik,
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('signedPDF', $data);
        return $pdf->stream('signed.pdf');
    }

    // Proses Signature
    public function signedAjuan(Request $request)
    {
        $ajuan = Surat::find($request->id_ajuan);

        //Load terlebih dahulu domPDF nya, lalu simpan
        $data = [
            'id' => $ajuan->id,
            'kategoriSurat' => $ajuan->kategoriSurat,
            'namaPengaju' => $ajuan->namaPengaju,
            'nik' => $ajuan->nik,
            'date' => date('mdY'),
        ];

        $pdf = PDF::loadView('signedPDF', $data);
        $pdfPath = 'storage/uploads/' . $data['kategoriSurat'] . $data['nik'] . $data['id'] . $data['date'] . '.pdf';
        $pdf->save(public_path($pdfPath));

        // Kemudian simpan pdf path dan perbarui status datatabase
        $ajuan->pdfDokumen = $pdfPath;
        $ajuan->statusSurat = '2';
        $ajuan->save();

        return redirect('./ajuan');
    }

    // Kirim beerkas melalui email
    public function sendEmail($ajuan_id)
    {
        $ajuan = Surat::find($ajuan_id);

        Mail::to($ajuan->email)->send(new TestingMail($ajuan));

        $ajuan->statusSurat = '3';
        $ajuan->save();

        return redirect('./ajuan');
    }

    // Page Riwayat Ajuan
    public function riwayatAjuan()
    {
        $ajuan = Surat::whereIn('statusSurat', [3, 4])->get();

        return view('riwayat', ['riwayat' => $ajuan]);
    }

    // Page Form Ajuan
    public function formRequests()
    {

        $kategoris = Kategori::all();

        return view('form', ['kategoris' => $kategoris]);
    }

    // Create ajuan
    public function store(Request $request)
    {
        $request->validate([
            'namaPengaju' => 'required',
            'nik' => 'required',
            'detailAjuan' => 'required',
            'wa' => 'required',
            'email' => 'required',
            'ktpPic' => 'required|file|mimes:jpeg,png,pdf|max:2048',

        ]);


        $ktpPicPath = null;

        if ($request->hasFile('ktpPic')) {
            $file = $request->file('ktpPic');
            $ktpPicPath = $file->store('uploads', 'public');
        }

        Surat::create([
            'namaPengaju' => $request->namaPengaju,
            'nik' => $request->nik,
            'wa' => $request->wa,
            'email' => $request->email,
            'detailAjuan' => $request->detailAjuan,
            'kategoriSurat' => $request->kategoriSurat,
            'ktpPic' => $ktpPicPath,
            'statusSurat' => 0
        ]);

        return back();
    }
}
