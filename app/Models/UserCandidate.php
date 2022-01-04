<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCandidate extends Model
{
    use HasFactory;
    protected $table = 'user_candidate';
    protected $fillable = ['name', 'avatar', 'cate_id ', 'location_id ', 'gender', 'birthday', 'address', 'phone_number', 'link', 'intro', 'detail'];
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
}
