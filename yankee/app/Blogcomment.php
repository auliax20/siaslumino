<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    protected $table = 'blog_comment';
	protected $primaryKey = 'id_comment';
	protected $fillable = array('id_post', 'comment', 'status');
	public $timestamps = false;
}
