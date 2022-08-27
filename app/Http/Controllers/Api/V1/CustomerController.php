<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Filter\V1\CustomerFilter;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = new CustomerFilter();
        $queryItems = $filters->transform($request);// [['column', 'operator', 'value']]

        if(count($queryItems) == 0){
            return new CustomerCollection(Customer::paginate(10));
        } else {
            return new CustomerCollection(Customer::where($queryItems)->paginate(10));
        }

    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }


}
