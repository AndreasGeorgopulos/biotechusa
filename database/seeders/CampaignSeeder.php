<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campaigns = [
            [
                'name' => 'July 2021 campaign',
                'description' => 'Test campaign on July 2021.',
                'start_date' => '2021-07-01',
                'finish_date' => '2021-07-31',
                'is_accepted' => 0,
            ],
            [
                'name' => 'August 2021 campaign',
                'description' => 'Test campaign on August 2021.',
                'start_date' => '2021-08-01',
                'finish_date' => '2021-08-31',
                'is_accepted' => 1,
            ],
            [
                'name' => 'October 2021 campaign',
                'description' => 'Test campaign on October 2021.',
                'start_date' => '2021-10-01',
                'finish_date' => '2021-10-31',
                'is_accepted' => 1,
            ],
            [
                'name' => 'December 2021 campaign',
                'description' => 'Test campaign on December 2021.',
                'start_date' => '2021-12-01',
                'finish_date' => '2021-12-31',
                'is_accepted' => 1,
            ],
        ];

        foreach ($campaigns as $data) {
            $campaign = new Campaign();
            $campaign->fill($data);
            $campaign->save();
        }
    }
}
