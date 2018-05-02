<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PracticeModel extends Model
{
	public $errors;
    public $title; 
    public $author; 
    public static $rules = ['title'=>'required', 'author'=>'required'];


    public function meta()
    {
    	// return '"'. $this->title . '" was written by '. $this->author .'.';
    	return sprintf('"%s" was written by %s.', $this->title, $this->author);
    }

    public function attributes()
    {
    	return ['title'=> $this->title, 'author'=> $this->author];
    }

    public function validate()
    {
    	$v = Validator::make($this->attributes(), static::$rules);

    	if ($v->fails()){
    		$this->errors = $v->messages();
    		return false;
    	} 

    	return true;
    }

    public function users()
    {
    	return $this->hasMany('App\User');
    }

}
