<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['name','author','status','priority','due_date', 'project_id', 'description'];

    //items
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function postedBy()
    {
        return $this->belongsTo(Karyawan::class, 'author', 'user_id');
    }

    protected $dates = ['due_date'];
    protected $casts = [
        'due_date' => 'date:Y-m-d'
    ];
}
