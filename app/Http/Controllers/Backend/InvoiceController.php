<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller implements ComponentCRUD
{
    public function index()
    {
        $invoices = Invoice::orderByDesc('date')->orderByDesc('id')->get();
        return view('backend.invoice.view')
            ->with([
                'invoices'=>$invoices
            ]);
    }

    public function add()
    {
        // TODO: Implement add() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, Request $request)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
