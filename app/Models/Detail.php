<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function good()
    {
        return $this->belongsTo(Good::class, 'good_id');
    }

    public function facture()
    {
        return $this->belongsTo(Facture::class, 'facture_id');
    }
}
