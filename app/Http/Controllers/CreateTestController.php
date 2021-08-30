<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Repositories\TestRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateTestController extends Controller
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function __invoke(Request $request)
    {
        $method = $request->getMethod();

        if ($method === 'POST') {

            $title = $request->input('title');
            $description = $request->input('description');
            $user = Auth::user();
            $userId = $user->id();

            $test = (new Test())
                ->setTitle($title)
                ->setDescription($description)
                ->setUserId($userId);

            $this->testRepository->save($test);

            return redirect('/dashboard');
        }

        return view('create_test');
    }

}
