<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'latitude', 'longitude', 'phone', 'created_by'];

    public function user(){
        return $this->belongsTo(User::class, $this->foreignKey['user'], 'id');
    }
}

