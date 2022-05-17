<?php

namespace App\Interfaces;

interface CustomerRepositoryInterface
{
    public function allCustomers();
    public function findCustomerById(Int $id);
    public function storeCustomer(Array $data);
    public function updateCustomer(Int $id, Array $data);
    public function deleteCustomer(Int $id);
}
