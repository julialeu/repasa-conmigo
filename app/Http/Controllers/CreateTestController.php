<?php
namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class CreateTestController extends Controller
{
    public function __invoke()
    {
        return view('create_test');
    }

}
