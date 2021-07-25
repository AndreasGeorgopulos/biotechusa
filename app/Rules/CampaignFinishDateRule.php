<?php

namespace App\Rules;

use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CampaignFinishDateRule implements Rule
{
    protected $carbon;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $start_date)
    {
        $this->carbon = Carbon::make($start_date);
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
        if (empty($this->carbon)) {
            return false;
        }

        $next_start_date = Campaign::where(function ($q) use ($value) {
            $q->where('start_date', '>', $this->carbon->format('Y-m-d'));
        })->min('start_date');

        if (!empty($next_start_date) && $next_start_date <= $value) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute cannot be for before the next campaign.';
    }
}
