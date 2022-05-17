<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function allCustomers()
    {
        return Customer::all();
    }

    public function findCustomerById(Int $id)
    {
        return Customer::find($id);
    }

    public function storeCustomer(Array $data)
    {
        return Customer::create($data);
    }

    public function updateCustomer(Int $id, Array $data)
    {
        $customer = Customer::find($id);
        $customer->update($data);
        return $customer;
    }

    public function deleteCustomer(Int $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return $customer;
    }
}

