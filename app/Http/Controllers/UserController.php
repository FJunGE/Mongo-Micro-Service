<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository as User;

/**
 * @group Banner management
 *
 * APIs for managing banner
 */
class UserController extends Controller
{

    /**
     * @var User
     */
    private $user;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function all()
    {
        return $this->responseJson(HTTP_CODE_OK,HTTP_CODE_OK_STR,$this->user->all());
    }

}