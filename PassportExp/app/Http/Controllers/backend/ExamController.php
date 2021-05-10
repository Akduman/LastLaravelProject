<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ExamRepository;
use App\Http\Requests\AdminRole\ExamRequestStore;
use App\Http\Requests\AdminRole\Multiple_ChoiceStoreRequest;
use App\Http\Resources\ExamCollection;
use App\Models\Exam;
use App\Models\Multiple_choice;
use Illuminate\Http\Request;


class ExamController extends Controller
{

    public function __construct()
    {
        $this->Repository = new ExamRepository(new Exam());        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request['id']= Auth::user()->id;
        // $request['id']=1; 
        $data = new ExamCollection($this->Repository->engine_search($request));
       // return view('Backend.Index');
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequestStore $request,Multiple_ChoiceStoreRequest $request_multiple)
    {
        // Eloquent
        $this->Repository->CreateExam($request,$request_multiple);
        return "success";
        ///Eksi kullandığım şablon düz
        return $this->Repository->CreateExam2($request,$request_multiple);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $this->Repository->find($exam->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam,ExamRequestStore $request)
    {
        return view('backend.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */

    public function update(ExamRequestStore $request,Multiple_ChoiceStoreRequest $request_multiple, Exam $exam)
    {
        $this->Repository->update_exam($request, $request_multiple,$exam);
        return $this->Repository->update($exam->id,$request->all());     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $request)
    {
        $this->Repository->remove($request->id);
    }
}
