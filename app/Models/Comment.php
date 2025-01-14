<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'content'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'userID');
    }
}
