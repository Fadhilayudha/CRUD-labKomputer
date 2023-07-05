<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabKomputer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $table = 'komputer_labs';
    
    protected $fillable = [
        'no_komputer',
        'ruang_penempatan',
        'merk_komputer',
        'kondisi',
    ];
}
