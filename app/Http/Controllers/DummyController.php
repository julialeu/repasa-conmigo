<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DummyController extends Controller
{
    public function __invoke(Request $request)
    {
        var_dump(DashboardController::class);
        die;

        // $userRepository->find($test->userId())
        return new JsonResponse(['ok']);
    }
}
