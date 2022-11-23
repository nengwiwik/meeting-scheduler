<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\SuksesRegister;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ScheduleMeetingController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'instansi' => 'required|string|max:191',
            'handphone' => 'required|string|max:191',
            'tujuan' => 'required|string|max:191',
            'waktu' => 'required|string|max:191',
            'deskripsi' => 'required|string',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berupa teks',
            'nama.max' => 'Nama maksimal 191 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 191 karakter',
            'instansi.required' => 'Instansi harus diisi',
            'instansi.string' => 'Instansi harus berupa teks',
            'instansi.max' => 'Instansi maksimal 191 karakter',
            'handphone.required' => 'Handphone harus diisi',
            'handphone.string' => 'Handphone harus berupa teks',
            'handphone.max' => 'Handphone maksimal 191 karakter',
            'tujuan.required' => 'Tujuan harus diisi',
            'tujuan.string' => 'Tujuan harus berupa teks',
            'tujuan.max' => 'Tujuan maksimal 191 karakter',
            'waktu.required' => 'Waktu harus diisi',
            'waktu.string' => 'Waktu harus berupa teks',
            'waktu.max' => 'Waktu maksimal 191 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.string' => 'Deskripsi harus berupa teks',
        ]);

        try {
            DB::transaction(function() use ($request) {
                $meeting = new Meeting();
                $meeting->nama = $request->nama;
                $meeting->email = $request->email;
                $meeting->instansi = $request->instansi;
                $meeting->handphone = $request->handphone;
                $meeting->tujuan = $request->tujuan;
                $meeting->waktu = $request->waktu;
                $meeting->deskripsi = $request->deskripsi;
                $meeting->created_by = $request->nama . " (Tamu)";
                $meeting->save();

                Mail::to($request->email)->send(new SuksesRegister($meeting));
                Mail::to(env('ADMININSTRATOR_EMAIL', 'admin@gmail.com'))->send(new SuksesRegister($meeting));
            });

            return view('register.sukses');
        } catch (\Exception $exception) {
            Log::withContext([
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'message' => $exception->getMessage(),
            ])->error('Terjadi kesalahan saat menyimpan data permohonan kunjungan');

            return view('register.gagal');
        }
    }
}
