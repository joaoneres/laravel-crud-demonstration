<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerController extends Controller
{
    protected $customer_repository;

    public function __construct(CustomerRepositoryInterface $customer_repository)
    {
        $this->customer_repository = $customer_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer_repository->allCustomers();
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customer_repository->storeCustomer($request->safe()->all());
        return redirect()->back()->with('customer', $customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {
        $customer = $this->customer_repository->findCustomerById($id);
        return view('customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Int $id)
    {
        $customer = $this->customer_repository->findCustomerById($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Int $id)
    {
        $customer = $this->customer_repository->updateCustomer($id, $request->safe()->all());
        return redirect()->route('customers.index')->with('customer', $customer)->with('operation', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function delete(Int $id)
    {
        $customer = $this->customer_repository->deleteCustomer($id);
        return redirect()->route('customers.index')->with('customer', $customer)->with('operation', 'deleted');
    }
}
