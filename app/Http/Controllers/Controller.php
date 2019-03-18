<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Validation\ValidationException;
//http://csprd-mongo.crazysales.com.au
/**
 *@OA\Info(title="Mongo Micro Service API Documentation", version="1.0")
 *@OA\Server(url="http://csprd-mongo.crazysales.com.au/v0/")
 *@OA\SecurityScheme(
 *   securityScheme="bearerAuth",
 *   type="http",
 *   scheme="bearer",
 *   bearerFormat="JWT"
 * )
 */
class Controller extends BaseController
{
    public function responseJson($customerCode,$message,$total,$data = [] ,$statusCode = 200, $header=array())
    {
        return response()->json([
            'total' => $total,
            'data' => $data,
            'status' => $customerCode,
            'statusText' => $message,
        ],$statusCode,$header);
    }

    /**
     * Override validate method use dingo validation exception
     *
     * @param Request $request
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     */
    public function validateRequest(
        Request $request,
        array $rules,
        array $messages = [],
        array $customAttributes = [])
    {

        try {
            $this->validate($request, $rules,$messages,$customAttributes);
        } catch (ValidationException $e) {
            $res = $e->getResponse()->getData();
            return [$e->status,$res];
        }

        return [HTTP_CODE_OK,HTTP_CODE_OK_STR];
    }
}
