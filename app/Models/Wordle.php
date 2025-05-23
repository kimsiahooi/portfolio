<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wordle extends Model
{
    /** @use HasFactory<\Database\Factories\WordleFactory> */
    use HasFactory;

    protected $fillable = ['word', 'length'];
}
