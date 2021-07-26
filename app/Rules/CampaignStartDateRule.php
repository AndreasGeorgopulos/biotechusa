<?php

namespace App\Rules;

use App\Models\Campaign;
use Illuminate\Contracts\Validation\Rule;

class CampaignStartDateRule implements Rule
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
        if (empty($value)) {
            return false;
        }

        return ! (bool) Campaign::where(function ($q) use ($value) {
            $q->where('start_date', '<=', $value);
            $q->where('finish_date', '>=', $value);
            if (!empty($this->campaign)) {
                $q->where('id', '<>', $this->campaign->id);
            }
        })->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute cannot be for the next campaign.';
    }
}
