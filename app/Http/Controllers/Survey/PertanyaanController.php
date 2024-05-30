<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey\PertanyaanSurveyModel;
use App\Models\Survey\SurveyModel;
use Alert;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $survey = SurveyModel::findOrFail($id);
        $pertanyaan = PertanyaanSurveyModel::where('survey_id', $survey->id)->get();
        return view('admin.survey.index_pertanyaan', compact('pertanyaan', 'survey'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $survey = SurveyModel::findOrFail($id);
        return view('admin.survey.create_pertanyaan', compact('survey'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
            $this->validate($request, [
                'pertanyaan' => 'required',
                'jenis' => 'required',
            ]);
            
            $survey = SurveyModel::findOrFail($id);
            
            //create post
            PertanyaanSurveyModel::create([
                'survey_id' => $survey->id,
                'pertanyaan' => $request->pertanyaan,
                'jenis' => $request->jenis,
            ]);
            
            Alert::success('Success', 'Pertanyaan anda berhasil disimpan!');
    
            //redirect to index
            return redirect()->route('pertanyaan.index', $id);
            // return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pertanyaan = PertanyaanSurveyModel::findorfail($id);
        return view('admin.survey.edit_pertanyaan', compact('pertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //get data by ID
        $pertanyaan = PertanyaanSurveyModel::findOrFail($id);
        $pertanyaan->update([
        'pertanyaan' => $request->pertanyaan,  
        ]);

        Alert::success('Success', 'Data Survey berhasil diupdate!');

        return redirect()->route('survey.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_deleted = 'yes';
        $query = PertanyaanSurveyModel::findOrFail($id)->update(['is_deleted'=> $is_deleted]);
        
        if ($query) {
            Alert::success('Success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }
        
        //redirect to index
        return redirect()->route('survey.index');
    }
}