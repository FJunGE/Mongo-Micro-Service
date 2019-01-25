<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductlogRepository as Productlog;

/**
 * @group Banner management
 *
 * APIs for managing banner
 */
class ProductlogController extends Controller
{

    /**
     * @var User
     */
    private $productlog;
    private $request;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(Request $request, Productlog $productlog)
    {
        $this->productlog = $productlog;
        $this->request = $request;
    }


    public function all()
    {
        return $this->responseJson(HTTP_CODE_OK,HTTP_CODE_OK_STR,$this->productlog->all());
    }

    /**
     * @OA\Get(path="/productlog/{productID}",
     *   tags={"product log"},
     *   summary="Get a product log data by productID",
     *   operationId="findByProductID",
     *   @OA\Parameter(name="productID",
     *     in="path",
     *     required=true,
     *     description="Such as: 123",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(response="200", description="product log data")
     * )
     */
    public function findByProductID($productID)
    {
        return $this->responseJson(HTTP_CODE_OK,HTTP_CODE_OK_STR,$this->productlog->findByProductID($productID));
    }

    /**
     * @OA\Post(
     *   path="/productlog/create",
     *   tags={"product log"},
     *   summary="Add a new product log data",
     *   description="",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(property="admin", type="string"),
     *               @OA\Property(property="brief", type="string"),
     *              @OA\Property(property="details", type="string"),
     *              @OA\Property(property="productID", type="string"),
     *              @OA\Property(property="remark", type="string"),
     *              @OA\Property(property="date", type="string")
     *           )
     *       )
     *   ),
     *   @OA\Response(response="200", description="return inserted data")
     * )
     */
    public function create()
    {

        list($statusCode, $statusText)  = $this->validateRequest($this->request, [
            'productID' => 'required|numeric',
            'admin' => 'required',
            'details' => 'required',
            'brief' => 'required'
        ],  __('messages'));

        if($statusCode != HTTP_CODE_OK){
            return $this->responseJson($statusCode,$statusText);
        }

        return $this->responseJson(HTTP_CODE_OK,HTTP_CODE_OK_STR,$this->productlog->create($this->request->all()));
    }

}