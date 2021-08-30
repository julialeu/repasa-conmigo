<?php

namespace App\Http\Controllers;

use App\Repositories\TestRepository;
use Illuminate\Http\Request;

class ShowTestController
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function __invoke(Request $request)
    {
        $testId = $request->route('testId');

        $test = $this->testRepository->findOrFail($testId);

        $data =  ['test' => $test];

        return view('show_test', $data);
    }
}
