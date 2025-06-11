<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'reg'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('ordered', function ($query) {
            $query->orderBy('created_at', 'desc');
        });
 
    }

    public function owners()
    {
    return $this->belongsToMany(UserProfile::class, 'plane_user_profile');
    }

    public function getDisplayNameAttribute()
    {
        return substr($this->type, 0, 20) . ' - ' . ($this->reg ?: 'No Reg');
    }
}

