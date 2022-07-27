<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id', 'title', 'description', 'status', 'role_id'];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function roles()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
