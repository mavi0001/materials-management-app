<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceTool extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designation',
        'inventory_number',
        'quantity',
        'material_reference',
        'in_stock',
        'on_loan',
        'under_reform'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'in_stock' => 'boolean',
        'on_loan' => 'boolean',
        'under_reform' => 'boolean',
        'quantity' => 'integer'
    ];

    /**
     * Get the display name for in_stock attribute
     */
    public function getInStockDisplayAttribute()
    {
        return $this->in_stock ? 'Oui' : 'Non';
    }

    /**
     * Get the display name for on_loan attribute
     */
    public function getOnLoanDisplayAttribute()
    {
        return $this->on_loan ? 'Oui' : 'Non';
    }

    /**
     * Get the display name for under_reform attribute
     */
    public function getUnderReformDisplayAttribute()
    {
        return $this->under_reform ? 'Oui' : 'Non';
    }
}
