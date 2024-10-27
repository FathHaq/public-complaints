<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'complaint_id',
        'response',
        'image',
    ];

    // relation
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function complaint()
    {
        return $this->hasOne(Complaint::class, 'id', 'complaint_id');
    }
}
