<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Coupon
 * @package App\Models
 */
class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var array|string[]
     */
    protected array $fillable = ['campaign_id', 'code', 'discount_value', 'discount_type'];

    /**
     * @return HasOne
     */
    public function campaign(): HasOne
    {
        return $this->hasOne(Campaign::class);
    }
}
