<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    protected $table = 'blog_post';
	protected $primaryKey = 'id_post';
	protected $fillable = array('title', 'id_category', 'post', 'featured', 'status', 'user', 'date_post');
	public $timestamps = false;
	public function consolecat(){
		return $this->belongsTo('App\Blogcategory','id_category','id_category');	
	}
}
?>