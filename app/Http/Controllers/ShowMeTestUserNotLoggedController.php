<?php

namespace App\Http\Controllers;

use App\Repositories\TestRepository;
use Illuminate\View\View;

class ShowMeTestUserNotLoggedController extends Controller
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function showWelcome(): View
    {
        $tests = $this->testRepository->getLastFiveTests();

        return view(
            'welcome',
            [
                'tests' => $tests,
            ]

        );
    }
}



