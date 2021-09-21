<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\TestRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function showDashboard(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $userId = $user->id();

        $tests = $this->testRepository->findByUserId($userId);

        return view(
            'dashboard',
           [
               'tests' => $tests,
               'username' => $user->name()
           ]
        );
    }
}
