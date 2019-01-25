<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/version",
     *     tags={"version"},
     *     summary="Get framework version",
     *     @OA\Response(response="200", description="Successful response")
     * )
     */
    public function version()
    {
        return phpinfo();//app()->version();
    }

    //
}
