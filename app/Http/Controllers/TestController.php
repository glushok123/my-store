<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Services\Test\TestService;

class TestController extends Controller
{
    public function test()
    {
        $service = TestService::getInstance();
        $service->test();
    }
}
