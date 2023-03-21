<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'forms';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'path_logo', 'path_qr', 'nama_vt', 'slug', 'excerpt', 'description','status' ,'type_id' ,'link_vt', 'seo_tittle', 'seo_desc'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
