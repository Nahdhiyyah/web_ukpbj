<?php

namespace App\Http\Controllers\Survey;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Survey\JawabanSurveyIsianModel;
use App\Models\Survey\JawabanSurveyPGModel;

class RekapSurveyController extends Controller
{
    public function index()
    {
        // Langkah 1: Ambil ID maksimum per grup
        $jawaban_pg = JawabanSurveyPGModel::select('user_id', 'survey_id', 'tanggal')
            ->where('is_deleted', 'no')
            ->groupBy('user_id', 'survey_id', 'tanggal')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.survey.rekap_jawaban', compact('jawaban_pg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($user_id, $survey_id, $tanggal)
    {
        $jawaban_pg = JawabanSurveyPGModel::where('survey_id', $survey_id)
            ->where('user_id', $user_id)
            ->where('tanggal', $tanggal)
            ->where('is_deleted', 'no')
            ->get();

        $jawaban_isian = JawabanSurveyIsianModel::where('survey_id', $survey_id)
            ->where('user_id', $user_id)
            ->where('tanggal', $tanggal)
            ->where('is_deleted', 'no')
            ->get();

        $total = $jawaban_pg->sum('jawaban_pg');

        if ($total >= 0 && $total <= 250) {
            $predikat = 'Kurang Baik';
        } elseif ($total >= 251 && $total <= 500) {
            $predikat = 'Cukup Baik';
        } elseif ($total >= 501 && $total <= 750) {
            $predikat = 'Baik';
        } elseif ($total >= 751 && $total <= 1000) {
            $predikat = 'Baik Sekali';
        }

        return view('admin.survey.detail_jawaban', compact('predikat', 'jawaban_pg', 'jawaban_isian', 'total'));

    }

    public function destroy($user_id, $survey_id, $tanggal)
    {
        $is_deleted = 'yes';
        $query1 = JawabanSurveyPGModel::where('user_id', $user_id)
            ->where('survey_id', $survey_id)
            ->where('tanggal', $tanggal)
            ->update(['is_deleted' => $is_deleted]);

        JawabanSurveyIsianModel::where('user_id', $user_id)
            ->where('survey_id', $survey_id)
            ->where('tanggal', $tanggal)
            ->update(['is_deleted' => $is_deleted]);

        if ($query1) {
            Alert::success('Success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }

        //redirect to index
        return redirect()->route('jawaban.index');
    }

}