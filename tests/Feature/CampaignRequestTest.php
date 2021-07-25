<?php

namespace Tests\Feature;

use App\Http\Requests\CampaignRequest;
use Tests\RequestAdapter;
use Tests\TestCase;

class CampaignRequestTest extends TestCase
{
    use RequestAdapter;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_campaign_request_test()
    {
        $this->validateRequest([
            'id' => 1,
            'name' => 'July 2021 campaign',
            'start_date' => '2021-07-28',
            'finish_date' => '2021-07-31',
            'is_accepted' => 0,
        ], CampaignRequest::class);
    }
}
