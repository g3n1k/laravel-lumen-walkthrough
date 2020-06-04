<?php

namespace App\Http\Controllers;
use App\Jawab;
use App\Biodata;
use Illuminati\Http\Request;

class JawabController extends Controller
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

    public function oneBiodata($id){
    
        return response()->json(Biodata::find($id));
    } 

    public function createBiodata(Request $request){
    
        $biodata = Biodata::create($request->all());

        return response()->json($biodata, 201);    
    }

    public function updateBiodata($id, Request $request)
    {
        $biodata = Biodata::findOrFail($id);
        
        $biodata->update($request->all());

        return response()->json($biodata, 200);
    }

    public function deleteBiodata($id)
    {
        Biodata::findOrFail($id)->delete();
        
        return response('Deleted Successfully', 200);
    }

    public function oneJawab($id){
    
        return response()->json(Jawab::find($id));
    } 

    public function createJawab(Request $request)
    {
        $jawab = Jawab::create($request->all());

        return response()->json($jawab, 201);
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
