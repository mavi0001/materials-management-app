<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipementAudiovisuel extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'inventory_number',
        'quantity',
        'material_reference',
        'available',
        'on_loan',
        'under_maintenance',
    ];
}
