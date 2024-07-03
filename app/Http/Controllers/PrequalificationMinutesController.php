<?php

namespace App\Http\Controllers;

use App\Models\PrequalificationMinutes;
use App\Http\Requests\StorePrequalificationMinutesRequest;
use App\Http\Requests\UpdatePrequalificationMinutesRequest;
use App\Models\Certificate;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;

class PrequalificationMinutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'vendor') {
            $berita = PrequalificationMinutes::with('user.vendorDetail')->where('user_id', auth()->user()->id)->get();
        } else {
            $berita = PrequalificationMinutes::with('user.vendorDetail')->get();
        }
        return view('berita-acara.index', [
            'berita' => $berita
        ]);
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
    public function store(StorePrequalificationMinutesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PrequalificationMinutes $beritum)
    {
        return view('berita-acara.show', [
            'berita' => $beritum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrequalificationMinutes $prequalificationMinutes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrequalificationMinutes $beritum)
    {
        $validatedData = $request->validate([
            'document_path' => 'required'
        ]);
        $validatedData['document_path'] = $request->file('document_path')->store('berita-acara');

        if (auth()->user()->role == 'vendor') {
            $validatedData['is_upload_vendor'] = 1;
            $beritum->update($validatedData);
            $manager = User::where('role', 'manager')->get();
            $manager->each(function ($manager) {
                $manager->notify(new EmailNotification('Ada berita acara yang sudah ditanda tangani oleh vendor', url('/berita'), 'Berita Acara'));
            });
        } elseif (auth()->user()->role == 'manager') {
            $validatedData['is_upload_manager'] = 1;
            $beritum->update($validatedData);
            $vendor = User::where('id', $beritum->user_id)->first();
            $vendor->notify(new EmailNotification('Berita acara anda sudah di tanda tangani oleh manager csms, dan seritifikat anda bisa anda lihat pada link berikut', url('/sertifikat'), 'Berita Acara'));
            PrintController::sertifikat($beritum->id);
        }

        return redirect()->intended(route('berita-acara.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrequalificationMinutes $prequalificationMinutes)
    {
        //
    }
}
