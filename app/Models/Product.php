<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'desc',
        'category',
        'created_at',
        'updated_at'
        
    ];
    protected $primaryKey = 'id';
    protected $table = 'products';
    public function getPrice(){
        $user = auth()->user();
        if($user){
            return $this->price;
        }
        return false;
    }
}
