<?php
// app/Models/PropertyAttachment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'name', 'file_path'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
