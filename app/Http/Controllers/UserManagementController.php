<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
        public function index()
    {
        // $users = User::all();
        if (auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized');
        }
        return view('UserManajemen.index');
    }

        public function records()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('UserManajemen.records');
    }
}
