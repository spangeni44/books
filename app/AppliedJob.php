<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
   
    public $table="applied_jobs";
    protected $fillable=['name','career_id','email','address','phone','nationality','gender','citizenship_no','qualification','work_experience','preferred_shift','candidate_source','cv','status'];
    public function getAddRules(){
        return [
                'name'=>'required|string',
                'phone'=>'required|string',
                'nationality'=>'required|string',
                'gender'=>'string|in:Male,Female,Others',
            ];
    }
    public function career(){
        return $this->hasOne('App\Career','id','career_id');
    }
}
