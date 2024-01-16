<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str; // Import the Str facade
use App\Models\Customer;
use PDF; // Import the PDF facade

class InvoiceController extends Controller
{
    /*public function print(Order $order)
    {
        $pdf = PDF::loadView('invoices.print', array('order'=>$order));

        return $pdf->download('invoice.pdf');
    }*/

    public function print($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $totalAmount = $customer->orders()->sum('total_amount');
        $orders = $customer->orders()->with('products')->get();

        $pdf = PDF::loadView('invoices.customer_invoice', compact('customer', 'totalAmount', 'orders'));

       // Customize the PDF file name (e.g., using customer name and current date)
    $pdfFileName = 'invoice_' . Str::slug($customer->name) . '_' . now()->format('YmdHis') . '.pdf';

    return $pdf->stream($pdfFileName);
    }
}

