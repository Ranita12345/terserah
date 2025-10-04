<?php

namespace App\Http\Controllers\Sdm;

use App\Models\Admin;
use App\Models\Lecture;
use App\Http\Controllers\Controller;

class SdmController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        $lectures = Lecture::all();
        return view('sdm', compact('admins', 'lectures'));
    }
}
