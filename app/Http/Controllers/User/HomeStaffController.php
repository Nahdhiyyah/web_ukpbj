<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Staff;
use DB;

class HomeStaffController extends Controller
{
    public function index(){
        // $staff = Staff::orderBy('created_at', 'desc');
        $staff = DB::table('staff')->get();
        return view('user.struktur', compact('staff'));
    }
}