<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected$primaryKey = 'id';

    protected $fillable = ['name', 'contact', 'email', 'user_id'];

    protected $dates = ['deleted_at'];

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
