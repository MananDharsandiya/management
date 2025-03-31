<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = ['name', 'email', 'contact', 'address', 'status'];
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}