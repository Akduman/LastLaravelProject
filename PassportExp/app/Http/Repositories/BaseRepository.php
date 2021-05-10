<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\IEloquentRepository;
use App\Http\Requests\AdminRole\ExamRequestStore;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseRepository implements IEloquentRepository
{
    protected $model;
    protected $querry;    

    public function __construct(Model $model)     
    {         
        $this->model = $model;
        $this->querry = $model;    
    }

    public function create($model)
    {    
        return $this->model->create($model);
    }

    public function find($id) 
    {
        return $this->model->find($id);
    }

    public function update($id,array $input)
    {         
        return $this->model->find($id)->update($input);     
    }

    public function ListAll()
    {
       return $this->model->Paginate(3)->withQueryString();    
    }

    public function remove($id)
    {           
        return $this->model->find($id)->delete();        
    }

    public function search($column,$data)
    {
        try 
        {
            return $this->model->where($column,'like','%'.$data.'%');  
        } 
        catch (\Throwable $th) 
        {
            return $th;
        }
        
    }

    public function engine_search($request)
    {        
            $request=$request->all();
            foreach ($request as $key => $value) 
            {                     
                if ($key==$this->seach_able($key)) {
                    $this->model=$this->search($key,$value);     
                }
            }
           // return $this->model->offset(0)->limit(2)->get();
           return $this->ListAll();
    }

    public function seach_able($key)
    {
        foreach ($this->querry->seach_able as  $value) 
        {
            if ($key==$value) 
            {                          
                return true;                       
            }
        }
        return false;
    }

    public function match_values(Model $model,$input,$model_fkey=null,$input__fkey=null)
    {
        if ($model_fkey!=null &&$input__fkey!=null) {
            $input[$model_fkey]=$input__fkey;
        }
        //// bi ara $input içerisinde fk kontrolu yapan deyim ekle epx: $model["$model"."_id"] gibi
        foreach ($model->fillable as $key => $value) 
        {
            $model[$value]=$input[$value];          
        }
        return $model;
      
    }

 
}