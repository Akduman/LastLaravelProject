<?php

namespace App\Http\Interfaces;

use App\Http\Requests\AdminRole\ExamRequestStore;
use App\Http\Requests\AdminRole\Multiple_ChoiceStoreRequest;

interface IExam
{      
    public function CreateExam(ExamRequestStore $request,Multiple_ChoiceStoreRequest $request_multiple);

    //eskiisi
    public function CreateExamOld(ExamRequestStore $request,Multiple_ChoiceStoreRequest $request_multiple);
}