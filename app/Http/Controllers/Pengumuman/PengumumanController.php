<?php

namespace App\Http\Controllers\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

class PengumumanController extends Controller
{
    public function index(){
        $announcements = Announcement::all();
        return view('pengumuman.index', compact('announcements'));
    }

    public function show($slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();
        return view('pengumuman.show', compact('announcement'));
    }
}
