<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\IExam;
use App\Models\Exam;
use App\Http\Repositories\BaseRepository ;
use App\Http\Requests\AdminRole\ExamRequestStore;
use App\Http\Requests\AdminRole\Multiple_ChoiceStoreRequest;
use App\Http\Resources\ExamCollection;
use App\Models\Multiple_choice;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExamRepository extends BaseRepository implements IExam
{

    public function __construct(Exam $model)
    {        
        parent::__construct($model);
    }

    public function CreateExamOld(ExamRequestStore $request, Multiple_ChoiceStoreRequest $request_multiple)
    {
        $request=$request->all();
        $request['user_id']=1; /// Auth::user()->id;
        $result = $this->create($request);

        $question=$this->match_values(new Question(),$result,'exam_id',$result->id); 
        $result->questions()->save($question); 
        $result->refresh();

        foreach ($request_multiple['questions'] as $key => $value) 
        {
            $Multiple_choice=$this->match_values(new Multiple_choice(),$value,'question_id',$result->id); 
            $question->MultipleChoices()->save($Multiple_choice);
        }

        $question->refresh();
        return $request; 

    }

    public function CreateExam(ExamRequestStore $request, Multiple_ChoiceStoreRequest $request_multiple)
    {       
        $data = User::find(1);  //  Auth::user()->id       
        $data = $data->exams()->create($request->all());
        $data = $data->questions()->create();
        foreach ($request['questions'] as $key => $value) {
            $data->MultipleChoices()->createMany([$value]);
        }
        return "success";
    }


    public function update_exam(ExamRequestStore $request,Multiple_ChoiceStoreRequest $request_multiple, Exam $exam)
    {
        foreach ($exam->questions as $key => $question) {           
              foreach ($question->MultipleChoices as $key2 => $multiple) {  
                    if (isset($request_multiple['questions'][$key2])) {                         
                        Multiple_choice::find($multiple->id)->update($request_multiple['questions'][$key2]);
                    } 
                    else {
                        break;
                    }                                    
             }
        }        
    }
}