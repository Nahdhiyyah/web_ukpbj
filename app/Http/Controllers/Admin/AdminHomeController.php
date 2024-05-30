<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Survey\JawabanSurveyPGModel;

class AdminHomeController extends Controller
{
    public function index()
    {
        $tender = DB::table('tender')->get();
        $non_tender = DB::table('non_tenders')->get();
        $pencatatan = DB::table('swakelolas')->get();
        $e_purchasing = DB::table('e_purchasing')->get();

        // Mengambil data survei dari database dan mengelompokkan berdasarkan survey_id dan month (diambil dari created_at)
        $survey = JawabanSurveyPGModel::select(DB::raw("CAST(SUM(jawaban_pg) as int) as jawaban"))
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->where('is_deleted', 'no')
        ->pluck('jawaban');
        
        $bulan = JawabanSurveyPGModel::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->where('is_deleted', 'no')
        ->pluck('bulan');
                    
        return view('admin.adminHome', compact('tender', 'non_tender', 'pencatatan', 'e_purchasing', 'survey', 'bulan'));
    }
}