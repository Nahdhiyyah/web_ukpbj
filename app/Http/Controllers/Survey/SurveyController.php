<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey\SurveyModel;
use Alert;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $survey = SurveyModel::orderBy('created_at', 'desc')->get();
        return view('admin.survey.index_survey', compact('survey'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.survey.create_survey');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_survey' => 'required',
            'tanggal_buat' => 'required',
        ]);

        //create post
        SurveyModel::create([
            'judul_survey' => $request->judul_survey,
            'tanggal_buat' => $request->tanggal_buat,
        ]);
        
        Alert::success('Success', 'Survey anda berhasil disimpan!');

        //redirect to index
        return redirect()->route('survey.index');
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
        $survey = SurveyModel::findOrFail($id);
        return view('admin.survey.edit_survey', compact('survey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //get data by ID
        $survey = SurveyModel::findOrFail($id);
        $survey->update([
        'judul' => $request->judul,
        'tanggal_buat' => $request->tanggal_buat,
        'status' => $request->status,  
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
        $query = SurveyModel::findOrFail($id)->update(['is_deleted'=> $is_deleted]);        
        if ($query == true) {
            Alert::success('success', 'Data berhasil dihapus!');
        } else {
            Alert::error('Error', 'Data gagal dihapus');
        }
        
        //redirect to index
        return redirect()->route('survey.index');
    }
}