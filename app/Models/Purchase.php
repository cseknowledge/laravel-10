<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\PurchaseSuccessful;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'contact',
        'items',
    ];

    protected $dispatchesEvents = [
        'created' => PurchaseSuccessful::class,
    ];
}
