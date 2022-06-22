<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacature extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =
        [
            'title',
            'description',
            'company',
            'city',
            'type_id'
        ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
