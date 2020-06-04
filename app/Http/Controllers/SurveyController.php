<?php

namespace App\Http\Controllers;
use App\Survey;
use Illuminati\Http\Request;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return 'Hello World';
    }

    public function showAllSurvey(){
        return response()->json(Survey::all());
    }

    public function showOneSurvey($id){
        return response()->json(Survey::find($id));
    }
    public function createJawab(Request $request)
    {
        $survey = Survey::create($request->all());

        return response()->json($survey, 201);
    }

    public function updateJawaban($id, Request $request)
    {
        $survey = Survey::findOrFail($id);
        $survey->update($request->all());

        return response()->json($survey, 200);
    }

    public function deleteJawaban($id)
    {
        Survey::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
