<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    // public $table = 'complaints';
    public $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'image',
        'guest_name',
        'guest_email',
        'guest_telp'
    ];
    // public $guarded = ['id'];

    // relation
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
