<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Campaign
 * @package App\Models
 */
class Campaign extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var array|string[]
     */
    protected $fillable = ['name', 'description', 'start_date', 'finish_date', 'is_accepted'];

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return HasMany
     */
    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }
}
