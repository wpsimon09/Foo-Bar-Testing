<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foo extends Model
{
    use HasFactory;

    protected $fillable = [
        'bar',
        'happiness'
    ];

    public function isHappy() {
        if ($this->happiness >= 10)
            return true;
        return false;
    }
}
