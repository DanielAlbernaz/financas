<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    public $timestamps   = true;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'entries';

    protected $fillable = [
        'value',
        'description',
        'note',
    ];
}
