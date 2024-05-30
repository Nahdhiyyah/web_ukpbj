<?php

namespace App\Http\Controllers\Survey;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Survey\JawabanSurveyIsianModel;
use App\Models\Survey\JawabanSurveyPGModel;
use App\Models\Survey\PertanyaanSurveyModel;
use App\Models\Survey\SurveyModel;
use Auth;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_survey()
    {
        $survey = SurveyModel::orderBy('created_at', 'desc')->get();
        return view('user.survey.index_survey', compact('survey'));
    }

    public function index_pertanyaan($id)
    {
        $pertanyaan = PertanyaanSurveyModel::where('survey_id', $id)->where('is_deleted', 'no')->get();
        $survey = SurveyModel::get();

        return view('user.survey.index_pertanyaan', compact('pertanyaan', 'survey', 'id'));
    }

    public function store(Request $request)
    {

        $user_id = Auth::user()->id;

        // Cek duplikasi jawaban pilihan ganda
        if ($request->has('jawaban_pg')) {
            foreach ($request->jawaban_pg as $pertanyaan_id => $jawaban_pg) {
                $existingJawabanPG = JawabanSurveyPGModel::where('user_id', $user_id)
                    ->where('survey_id', $request->survey_id)
                    ->where('pertanyaan_id', $pertanyaan_id)
                    ->where('is_deleted', 'no')
                    ->first();

                if ($existingJawabanPG) {
                    Alert::warning('Survey tidak dapat disimpan', 'Anda sudah mengisi survey ini');

                    return redirect()->route('index.survey.user');
                }
            }
        }

        // Cek duplikasi jawaban isian
        if ($request->has('jawaban_isian')) {
            foreach ($request->jawaban_isian as $pertanyaan_id => $jawaban_isian) {
                $existingJawabanIsian = JawabanSurveyIsianModel::where('user_id', $user_id)
                    ->where('survey_id', $request->survey_id)
                    ->where('pertanyaan_id', $pertanyaan_id)
                    ->where('is_deleted', 'no')
                    ->first();

                if ($existingJawabanIsian) {
                    Alert::warning('Survey tidak dapat disimpan', 'Anda sudah mengisi survey ini');

                    return redirect()->route('index.survey.user');
                }
            }
        }

        // Proses jawaban pilihan ganda
        if ($request->has('jawaban_pg')) {
            foreach ($request->jawaban_pg as $pertanyaan_id => $jawaban_pg) {
                JawabanSurveyPGModel::create([
                    'user_id' => $user_id,
                    'survey_id' => $request->survey_id,
                    'pertanyaan_id' => $pertanyaan_id,
                    'tanggal' => now()->toDateString(), // Simpan langsung nilai jawaban pilihan ganda
                    'jawaban_pg' => $jawaban_pg,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Proses jawaban isian
        if ($request->has('jawaban_isian')) {
            foreach ($request->jawaban_isian as $pertanyaan_id => $jawaban_isian) {
                JawabanSurveyIsianModel::create([
                    'user_id' => $user_id,
                    'survey_id' => $request->survey_id,
                    'pertanyaan_id' => $pertanyaan_id,
                    'tanggal' => now()->toDateString(),
                    'jawaban_isian' => $jawaban_isian, // Simpan langsung nilai jawaban isian
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        Alert::success('Success', 'Terimakasih, Jawaban anda berhasil disimpan!');

        return redirect()->route('index.survey.user');

    }
}