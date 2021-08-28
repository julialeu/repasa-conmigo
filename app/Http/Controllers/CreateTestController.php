<?php
namespace App\Http\Controllers;



use Illuminate\Http\Request;

class CreateTestController extends Controller
{
    public function __invoke(Request $request)
    {


        $method = $request->getMethod();

        if ($method === 'POST') {

            $title = $request->input('title');
            $description = $request->input('description');




            var_dump($title);
            var_dump($description);


            die('IT IS A POST :)');
        }

        return view('create_test');
    }

}
