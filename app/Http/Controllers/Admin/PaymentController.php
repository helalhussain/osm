<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            return DataTables::eloquent(Payment::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('admin.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
