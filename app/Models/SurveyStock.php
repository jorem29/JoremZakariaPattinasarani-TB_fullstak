<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyStock extends Model
{
    use HasFactory;
    protected $table = 'survey_stocks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'barang_id',
        'outlet_id',
        'jumlah_stok',
        'jumlah_display',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
    public function outlet()
    {
        return $this ->belongsTo(outlet::class);
    }
}
