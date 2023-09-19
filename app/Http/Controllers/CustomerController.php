<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $getTest = Customer::select('id', 'name', 'kana', 'tel')->get();
        // $getPaginate = Customer::select('id', 'name', 'kana', 'tel')->paginate(50);

        // dd($getTest);

        // $customers = Customer::select('id', 'name', 'email', 'tel', 'memo')
        // ->orderBy('id', 'desc')
        // ->paginate(10);

        // return Inertia::render('Customers/Index', [
        //     'customers' => $customers,
        //     'filters' => $request->all('search'),
        // ]); 
        return Inertia::render('Customers/Index', [
            // 'customers' => Customer::select('id', 'name', 'email', 'tel', 'memo', 'kana')
            // ->get()

                        'customers' => Customer::select('id', 'name', 'email', 'tel', 'memo', 'kana')
            ->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
