<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'price', 'date', 'excursion_id', 'description', 'order_id', 'session_id', 'tran_id', 'tran_time', 'status'];
}
