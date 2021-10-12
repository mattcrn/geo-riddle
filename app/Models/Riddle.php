<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riddle extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat',
        'lng',
        'copy',
        'solution',
    ];

    /**
     * The roles that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('solved');
    }
}
