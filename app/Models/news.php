<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Comment;

class news extends Model
{
    use HasFactory;

    public function scopeSearch($query, $searchText)
    {
    	return $query->where('title', 'like', '%' . $searchText . '%')->where(
    		'status', 'public');
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
