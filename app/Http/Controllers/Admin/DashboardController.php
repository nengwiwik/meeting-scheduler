<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(Request $request)
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'pending' => Meeting::where('status', Meeting::STATUS_PENDING)->count(),
            'approved' => Meeting::where('status', Meeting::STATUS_APPROVED)->count(),
            'rejected' => Meeting::where('status', Meeting::STATUS_REJECTED)->count(),
            'total' => Meeting::count(),
        ]);
    }
}
