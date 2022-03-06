<?php

namespace App\Traits;

trait TestTrait
{
    public function assertProperJsonFormat($response)
    {
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'success',
                'status',
                'data'
            ]
        );
    }
    public function assertSuccessfulResponse($response)
    {
        $this->assertTrue($response['status'] == 200);
        $this->assertTrue($response['success']);
    }

    public function assertUnprocessableResponse($response)
    {
        $this->assertTrue($response['status'] == 422);
        $this->assertTrue($response['success'] == false);
    }

    public function assertUnauthorizedResponse($response)
    {
        $this->assertTrue($response['success'] == false);
        $this->assertTrue($response['status'] == 403);
    }

    public function assertUnauthenticatedResponse($response)
    {
        $this->assertTrue($response['status'] == 401);
        $this->assertTrue($response['success'] == false);
    }

    public function assertModelNotFoundResponse($response)
    {
        $this->assertTrue($response['success'] == false);
        $this->assertTrue($response['status'] == 404);
    }
}
