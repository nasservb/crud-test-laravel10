<?php

namespace App\Domains\Customer\Http\Controllers;

use App\Domains\Customer\Http\Resources\CustomerListResource;
use App\Domains\Customer\Models\Customer;
use App\Domains\Customer\Http\Requests\CustomerRequest;
use App\Domains\Customer\Http\Resources\CustomerResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @OA\Info(
 *     description="This is the customer API",
 *     version="1.0.0",
 *     title="customer API"
 * )
 */
class CustomerController extends Controller
{
    /**
     * @OA\Get(
     * path="/v1/customer",
     * summary="Retrieve customers information",
     * description="list show paginated customers",
     * operationId="customerIndex",
     * tags={"customer"},
     * security={ {"bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/Customer")
     *        )
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="User should be authorized to get profile information",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Not authorized"),
     *    )
     * )
     * )
     *
     *
     * Display a listing of the customer.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CustomerListResource::collection(Customer::query()->paginate());
    }

    /**
     * @OA\Post(
     * path="/v1/customer/",
     * summary="create customer",
     * description="create customer by given information",
     * operationId="customerCreate",
     * tags={"customer"},
     * security={ {"bearer": {} }},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *      required={"email"},
     *      @OA\Property(property="first_name", type="string", example="user1"),
     *      @OA\Property(property="last_name", type="string", example="user1"),
     *      @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *      @OA\Property(property="phone_number", type="string", example="+989189151266"),
     *      @OA\Property(property="bank_account_number", type="string", example="51655555000555"),
     *      @OA\Property(property="date_of_birth", type="string", format="date", example="1999-11-05")
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/Customer")
     *        )
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="User should be authorized to get profile information",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Not authorized"),
     *    )
     * )
     * )
     * Store a newly created customer in database.
     *
     * @param CustomerRequest $request
     * @return CustomerResource
     */
    public function store(CustomerRequest $request)
    {
        $item = Customer::create($request->all());
        return new CustomerResource($item);
    }

    /**
     *
     * @OA\Get(
     * path="/v1/customer/{id}",
     * summary="Retrieve customer information by id",
     * description="show customer information",
     * operationId="customerShow",
     * tags={"customer"},
     * security={ {"bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/Customer")
     *        )
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="User should be authorized to get profile information",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Not authorized"),
     *    )
     * )
     * )
     *
     * Display the specified customer.
     *
     * @param  Customer  $customer
     * @return CustomerResource
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * @OA\Put(
     * path="/v1/customer/{id}",
     * summary="update customer information",
     * description="update customer information by id",
     * operationId="customerUpdate",
     * tags={"customer"},
     * security={ {"bearer": {} }},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *      required={"email"},
     *      @OA\Property(property="first_name", type="string", example="user1"),
     *      @OA\Property(property="last_name", type="string", example="user1"),
     *      @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *      @OA\Property(property="phone_number", type="string", example="+989189151266"),
     *      @OA\Property(property="bank_account_number", type="string", example="51655555000555"),
     *      @OA\Property(property="date_of_birth", type="string", format="date", example="1999-11-05")
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/Customer")
     *        )
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="User should be authorized to get profile information",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Not authorized"),
     *    )
     * )
     * )
     *
     * Update the specified customer in database.
     *
     * @param CustomerRequest $request
     * @param Customer $customer
     *
     * @return CustomerResource
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->date_of_birth = $request->date_of_birth;
        $customer->update();

        return new CustomerResource($customer);
    }

    /**
     * @OA\Delete(
     * path="/v1/customer/{id}",
     * summary="remove customer information",
     * description="remove customer information by id",
     * operationId="customerDelete",
     * tags={"customer"},
     * security={ {"bearer": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="OK")
     *        )
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="User should be authorized to get profile information",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Not authorized"),
     *    )
     * )
     * )
     *
     * Remove the specified customer from database.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(['OK']);
    }
}
