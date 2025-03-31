<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = ['customer_id', 'time', 'communication_medium', 'message'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
