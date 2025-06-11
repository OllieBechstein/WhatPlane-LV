<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'score'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function planes()
    {
        return $this->belongsToMany(Plane::class, 'plane_user_profile');
    }
}
