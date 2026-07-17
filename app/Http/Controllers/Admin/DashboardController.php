<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Media;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'pagesCount' => Page::count(),
            'mediasCount' => Media::count(),
            'usersCount' => User::count(),
        ]);
    }
}