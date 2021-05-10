<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Model;


interface IEloquentRepository
{
   public function create($model);
   public function remove(Model $model);
   public function update(Model $model,array $input);
   public function find($id);
   public function ListAll();

   public function search($column,$data);
   public function engine_search($request);

   public function match_values(Model $model,$input,$model_fkey=null,$input__fkey=null);


}