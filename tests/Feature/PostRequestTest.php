<?php

namespace Tests\Feature;

use App\Http\Requests\PostRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\RequestAdapter;
use Tests\TestCase;

class PostRequestTest extends TestCase
{
    use RequestAdapter;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_request_test()
    {
        $this->validateRequest([
            'campaign_id' => 1,
            'title' => 'Post for August 2021',
            'description' => 'This post is test for August 2021 campaign',
            'published_at' => '2021-07-02 00:00:00',
        ], PostRequest::class);
    }
}
