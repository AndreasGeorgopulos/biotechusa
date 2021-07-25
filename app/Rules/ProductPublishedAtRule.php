<?php

namespace App\Rules;

use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class ProductPublishedAtRule implements Rule
{
    protected $campaign;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($campaignId)
    {
        $this->campaign = Campaign::find($campaignId);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (empty($this->campaign)) {
            return false;
        }

        $value = Carbon::make($value)->format('Y-m-d');
        return $value >= $this->campaign->start_date && $value <= $this->campaign->finish_date;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return !empty($this->campaign) ? 'The :attribute must be a datetime between ' . $this->campaign->start_date . ' and ' . $this->campaign->finish_date : '';
    }
}
