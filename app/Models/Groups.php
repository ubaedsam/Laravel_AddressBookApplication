<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected $table = "group"; // menghubungkan ke dalam tabel jabatan

    public function contacts()
    {
        $this->hasOne(Contacts::class);
    }

    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('group','like', $term);
        });

    }
}
