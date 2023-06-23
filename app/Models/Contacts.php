<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = "contact"; // menghubungkan ke dalam tabel contact

    protected $fillable = [
        'group_id',
        'name',
        'address',
        'phone',
    ];

    public function group()
    {
        return $this->belongsTo(Groups::class);
    }
    
    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('name','like', $term)
            ->orWhere('address','like',$term)
            ->orWhere('phone','like',$term);
        });

    }
}
