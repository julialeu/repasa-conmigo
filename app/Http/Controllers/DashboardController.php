<?php

namespace App\Http\Controllers;

use App\Repositories\TestRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id();



        $tests = $this->testRepository->findByUserId($userId);


        return view('dashboard', ['tests' => $tests]);
    }
}
