<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var array|string[]
     */
    protected array $fillable = ['campaign_id', 'name', 'description', 'price', 'published_at'];

    /**
     * @return HasOne
     */
    public function campaign(): HasOne
    {
        return $this->hasOne(Campaign::class, 'id', 'campaign_id');
    }
}
