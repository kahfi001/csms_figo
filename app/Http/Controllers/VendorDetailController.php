<?php

namespace App\Http\Controllers;

use App\Models\VendorDetail;
use App\Http\Requests\StoreVendorDetailRequest;
use App\Http\Requests\UpdateVendorDetailRequest;
use Illuminate\Http\Request;

class VendorDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendor = VendorDetail::with('user')->where('user_id', auth()->user()->id)->first();
        $countVendor = VendorDetail::with('user')->where('user_id', auth()->user()->id)->count();
        return view('perusahaan.index', [
            'vendor' => $vendor,
            'countVendor' => $countVendor
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'npwp' => 'required',
            'nama_perusahaan' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'no_tdp' => 'required',
            'no_siup' => 'required',
            'direktur' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if ($request->input('action') == 'simpan') {
            VendorDetail::create($validatedData);
        } elseif ($request->input('action') == 'ubah') {
            VendorDetail::where('id', $request->input('id'))->update($validatedData);
        }

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(VendorDetail $vendorDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VendorDetail $vendorDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorDetailRequest $request, VendorDetail $vendorDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VendorDetail $vendorDetail)
    {
        //
    }
}
