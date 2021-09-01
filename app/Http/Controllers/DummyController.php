<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Repositories\TestRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DummyController extends Controller
{
    public function __invoke(Request $request)
    {
        $test = Test::find(1);

        var_dump($test->userObj());

        // $userRepository->find($test->userId())
        return new JsonResponse('ooook');
    }
}
