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
                ->addIndexColumn()
                ->make(true);
        }

        return view('users.index');
    }
}
