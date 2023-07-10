<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;

    protected $table = 'outlets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_outlet',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function survey()
    {
        return $this->hasMany(SurveyStock::class);
    }

}
