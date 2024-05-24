<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::all();
            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    return view('users.action', compact('user'));
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users.index');
    }

    public function add()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $validatedData['password'] = bcrypt($request->input('password'));

        User::create($validatedData);

        return redirect()->route('users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users');
    }
}
