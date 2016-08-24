<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    protected $table = 'blog_category';
	protected $primaryKey = 'id_category';
	protected $fillable = array('category', 'status');
	public $timestamps = false;
}
