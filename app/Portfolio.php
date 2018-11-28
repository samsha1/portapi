<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {

    protected $fillable = [
    	'title','description','url','language',
    ];

    protected $dates = [];

  
    // public function save(){
    // 	return $this->hasOne('App\Portfolio');
    // }

    // Relationships

}
