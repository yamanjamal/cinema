<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends BaseController
{
    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Invoice::class,'invoice');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myinvoices()
    {
        $this->authorize('myinvoices', Invoice::class);
        $invoices = auth()->user()->Account->Invoices()->paginate($this->paginate);
        return $this->sendResponse(InvoiceResource::collection($invoices)->response()->getData(true),'Invoices sent sussesfully');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreInvoiceRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreInvoiceRequest $request)
    // {
    //     $invoice = Invoice::create($request->validated());
    //     return $this->sendResponse(new InvoiceResource($invoice),'Invoice created sussesfully');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return $this->sendResponse(new InvoiceResource($invoice),'Invoice shown sussesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());
        return $this->sendResponse(new InvoiceResource($invoice),'Invoice updated sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return $this->sendResponse(new InvoiceResource($invoice),'Invoice deleted sussesfully');
    }
}
