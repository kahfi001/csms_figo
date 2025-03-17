<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VendorDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('role', '=', 'vendor')->get();
            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    return view('vendor-page.action', compact('user'));
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('vendor-page.index');
    }

    public function show(Request $request)
    {
        $vendor = VendorDetail::where('user_id', $request->id)->first();
        return view('vendor-page.detail', [
            'title' => 'Detail',
            'vendor' => $vendor
        ]);
    }
}
