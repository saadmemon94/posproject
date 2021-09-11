<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\Models\Payment;
use App\Models\Sale;
use App\Models\Purchase;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use DB;
use Input;
use Session;
use Response;
use Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Payment $model, Customer $model2)
    {
        // $payments = $model->paginate(15)->items();
        $customers = Customer::where('status_id', 1)->get();
        $payments = Payment::get();
        $payments = Payment::join('customers', 'payments.payment_customer_id', '=', 'customers.customer_id')->leftJoin('sales', 'payments.sale_id', '=', 'sales.sale_id')->leftJoin('users', 'payments.payment_created_by', '=', 'users.id')
        // ->select('payments.*', 'sales.*', 'customers.customer_name', 'users.name', )
        ->get();
        // dd($payments);

        return view('sales.payment', compact('payments', 'customers') );
        // return view('sales.payment', ['payments' => $payments]);
    }

    public function indexpurchase(Payment $model, Supplier $model2)
    {
        // $payments = $model->paginate(15)->items();
        $suppliers = Supplier::where('status_id', 1)->get();
        $payments = Payment::get();

        return view('purchases.payment', compact('payments', 'suppliers') );
        // return view('sales.payment', ['payments' => $payments]);
    }

    public function getRowDetailsData()
    {
        $payments = Payment::join('customers', 'payments.payment_customer_id', '=', 'customers.customer_id')->leftJoin('sales', 'payments.sale_id', '=', 'sales.sale_id')->join('users', 'payments.payment_created_by', '=', 'users.id')
        // ->select('payments.*', 'sales.*', 'customers.customer_name', 'users.name', )
        ->get();
        $customers = Customer::where('status_id', 1)->get();
        // dd($sales);
        return Datatables::of($payments)
        ->addIndexColumn()
        // ->addColumn('action', function ($payments) {
        //     return '<a type="button" href="payment/'. $payments->payment_id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
        // })
        ->make(true);
    }

    public function getRowDetailsData2()
    {
        $payments = Payment::join('suppliers', 'payments.payment_supplier_id', '=', 'suppliers.supplier_id')->leftJoin('purchases', 'payments.purchase_id', '=', 'purchases.purchase_id')->join('users', 'payments.payment_created_by', '=', 'users.id')
        // ->select('payments.*', 'purchases.*', 'suppliers.supplier_name', 'users.name', )
        ->get();
        $suppliers = Supplier::where('status_id', 1)->get();
        return Datatables::of($payments)
        ->addIndexColumn()
        // ->addColumn('action', function ($payments) {
        //     return '<a type="button" href="payment/'. $payments->payment_id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
        // })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sale $model, Customer $model2, Payment $model3)
    {
        $sales = $model->paginate(15)->items();
        // $sales = sale::get();
        $customers = Customer::where('status_id', 1)->get();
        $payments = Payment::get();

        $lastpayment = DB::table('payments')->orderBy('payment_id', 'desc')->limit(1)->first();
        $lastid = (string)$lastpayment->payment_id+1;
        $lastid = substr($lastid, -8);
        $lastid = str_pad($lastid, 8, '0', STR_PAD_LEFT);
        $year = (string)Carbon::now()->year;
        $payment_invoice_id = 'payment-'.$year.'-'.$lastid;

        return view('sales.paymentadd', compact('sales', 'customers', 'payments', 'payment_invoice_id') );
        // return view('sales.payment', ['sales' => $sales, 'customers' => $customers, 'payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchasecreate(Purchase $model, Supplier $model2, Payment $model3)
    {
        $purchases = $model->paginate(15)->items();
        // $purchases = Purchase::all();
        $suppliers = Supplier::where('status_id', 1)->get();
        $payments = Payment::get();

        $lastpayment = DB::table('payments')->orderBy('payment_id', 'desc')->limit(1)->first();
        $lastid = (string)$lastpayment->payment_id+1;
        $lastid = substr($lastid, -8);
        $lastid = str_pad($lastid, 8, '0', STR_PAD_LEFT);
        $year = (string)Carbon::now()->year;
        $payment_invoice_id = 'payment-'.$year.'-'.$lastid;

        return view('purchases.paymentadd', compact('purchases', 'suppliers', 'payments', 'payment_invoice_id') );
        // return view('purchases.payment', ['purchases' => $purchases, 'suppliers' => $suppliers, 'payments' => $payments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'payment_id'                 => '',
            'payment_ref_no'             => '',
            'payment_type'               => 'required',//'initial/opening_balance', 'opening_stock', 'credit', 'debit', 'deposit', 'transfer', 'refund', 'sale_return', 'purchase_return'
            'payment_customer_id'        => 'required',
            'payment_method'             => 'required',//'cash', 'credit', 'deposit', 'card', 'cheque', 'other'
            'payment_amount_recieved'    => 'required',
            'payment_amount_balance'     => '',
            'payment_cheque_no'          => '',
            'payment_cheque_date'        => '',
            'account_id'                 => '',
            'payment_note'               => '',
            'payment_status'             => '',//'paid', 'due', 'partial', 'overdue'
            'sale_invoice_id'            => '',
            'payment_invoice_id'         => '',
            'payment_invoice_date'       => 'required',
            'payment_document'           => '',
            'created_by'                 => '',
        ]);
        if ($validate->fails()) {
        //    return response()->json("Fields Required", 400);
            return redirect()->back()->withErrors($validate);

        }
        $payment_ref_no = $random = Str::random(8); //str_random
        $lastpayment = DB::table('payments')->orderBy('payment_id', 'desc')->limit(1)->first();
        $lastid = (string)$lastpayment->payment_id+1;
        $lastid = substr($lastid, -8);
        $lastid = str_pad($lastid, 8, '0', STR_PAD_LEFT);
        $year = (string)Carbon::now()->year;
        $payment_invoice_id = 'payment-'.$year.'-'.$lastid;
        $payment_type = 'credit';
        //$payment_adds = $request->except('document');
        //$payment_adds['ref_no'] = 'pr-' . date("Ymd") . '-'. date("his");
        $payment_amount_recieved = $request->payment_amount_recieved;
        // $payment_amount_balance = $request->payment_amount_paid;
        $customer_id = $request->payment_customer_id;
        $getcustomer = DB::table('customers')->where('customer_id','=', $customer_id)->first();
        // dd($getcustomer);

        // $customer_amount_paid = $request->customer_amount_paid;
        // $customer_amount_dues = $request->customer_amount_dues;
        $customer_amount_paid = $getcustomer->customer_balance_paid;
        $customer_amount_dues = $getcustomer->customer_balance_dues;

        $searchsale=NULL;
        if($request->sale_invoice_id){
            $sale_purch_invoice_id = $request->sale_invoice_id;
            $searchsale = DB::table('sales')->where('sale_invoice_id', '=', $sale_purch_invoice_id)->first();
        }

        if($payment_amount_recieved > $customer_amount_dues){
            if($searchsale){
                $sale_amount_paid = $searchsale->sale_amount_paid + $payment_amount_recieved;
                $sale_amount_dues = $searchsale->sale_amount_dues - $payment_amount_recieved;
            }

            $customer_amount_paid = $customer_amount_paid + $payment_amount_recieved;
            $customer_amount_dues = $customer_amount_dues - $payment_amount_recieved;

            // $payment_amount_paid = $payment_amount_paid - $payment_amount_recieved;
            // $payment_amount_balance = $payment_amount_balance - $payment_amount_recieved;
        }
        else{
            if($searchsale){
                $sale_amount_paid = $searchsale->sale_amount_paid + $payment_amount_recieved;
                $sale_amount_dues = $searchsale->sale_amount_dues - $payment_amount_recieved;
            }

            $customer_amount_paid = $customer_amount_paid + $payment_amount_recieved;
            $customer_amount_dues = $customer_amount_dues - $payment_amount_recieved;

            // $payment_amount_paid = $payment_amount_paid - $payment_amount_recieved;
            // $payment_amount_balance = $payment_amount_balance - $payment_amount_recieved;
        }

        if($searchsale){
            $sale_edits = array(
                'sale_amount_paid' => $sale_amount_paid,
                'sale_amount_dues' => $sale_amount_dues,
            );
            $update_sale = DB::table('sales')->where('sale_invoice_id', '=', $sale_purch_invoice_id)->update($sale_edits);
        }

        $customer_id = $request->payment_customer_id;
        // $customer_name = $request->payment_customer_name;

        $customer_edits = array(
            'customer_balance_paid' 	=> $customer_amount_paid,
            'customer_balance_dues' 	=> $customer_amount_dues,
            // 'customer_total_balance'    => $request->customer_total_balance,
        );

        $update = DB::table('customers')->where('customer_id','=', $customer_id)->update($customer_edits);
        $sale_data = DB::table('sales')->where('sale_invoice_id','=', $request->sale_invoice_id)->first();

        if($sale_data !== NULL){
            $sale_id = $sale_data->sale_id;
        }
        else{
            $sale_id = NULL;
        }

        $payment_adds = array(
            'payment_ref_no'           => $payment_ref_no,
            'payment_type'             => $request->payment_type,
            'sale_id'                  => $sale_id,
            'payment_customer_id'      => $request->payment_customer_id,
            // 'payment_status'           => $request->payment_status,
            'payment_status'           => 'done',
            'payment_note'             => $request->payment_note,
            'payment_amount_paid'      => $payment_amount_recieved,
            // 'payment_amount_balance'   => $payment_amount_balance,
            'customer_amount_paid'     => $customer_amount_paid,
            'customer_amount_dues'     => $customer_amount_dues,
            'payment_method'           => $request->payment_method,
            'payment_cheque_no'        => $request->payment_cheque_no,
            // 'payment_document'         => $request->payment_document,
            // 'account_id'               => $request->account_id,
            'sale_purch_invoice_id'    => $request->sale_invoice_id,
            'payment_invoice_id'       => $payment_invoice_id,
            'payment_invoice_date'     => $request->payment_invoice_date,
            // 'payment_date'             => $request->payment_date,
            'payment_created_by' 	   => Auth::user()->id,
            'created_at'	 		   => date('Y-m-d h:i:s'),
        );
        $document = $request->payment_document;
        if($document){
            $v = Validator::make([
                    'extension' => strtolower($request->payment_document->getClientOriginalExtension()),
                ],
                [
                    'extension' => 'in:pdf,csv,docx,pptx,xlsx,txt',
            ]);
            if($v->fails()) {
                return redirect()->back()->withErrors($v->errors());
            }
            $documentName = $document->getClientOriginalName();
            // dd($documentName);
            // $document->move('public/documents/payment', $documentName);
            Storage::disk('documents')->put('/', $document);
            // Storage::putFile('documents', $document, $documentName);
            $payment_adds['payment_document'] = $documentName;
        }

        $save = DB::table('payments')->insert($payment_adds);
        $this_payment_id = DB::getPdo()->lastInsertId();
        // $add_id = DB::table('payments')->insertGetId($payment_adds)

        if($sale_data !== NULL){
            $warehouse_data = Warehouse::where('warehouse_id', $sale_data->warehouse_id)->first();
        }else{
            $warehouse_data = Warehouse::where('warehouse_id', NULL)->first();
        }
        $user_data = User::where('id', Auth::user()->id)->first();
        $customer_data = Customer::where('customer_id', $request->payment_customer_id)->first();
        $payment_data = Payment::where('payment_id', $this_payment_id)->first();

        return view('sales.paymentinvoice', compact('user_data', 'warehouse_data', 'customer_data', 'payment_data',));

        // Session::flash('message' , 'Payment Created Successfully');
        // // return redirect('sale/payment');
        // return redirect()->back();
        // if($save){
		// 	return response()->json(['data' => $payment_adds, 'message' => 'Payment Created Successfully'], 200);
		// }else{
		// 	return response()->json("Oops! Something Went Wrong", 400);
		// }
    }

    public function purchasestore(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'payment_id'                 => '',
            'payment_ref_no'             => '',
            'payment_type'               => 'required',//'initial/opening_balance', 'opening_stock', 'credit', 'debit', 'deposit', 'transfer', 'refund', 'sale_return', 'purchase_return'
            'payment_supplier_id'        => 'required',
            'payment_method'             => 'required',//'cash', 'credit', 'deposit', 'card', 'cheque', 'other'
            'payment_amount_paid'        => 'required',
            'payment_amount_balance'     => '',
            'payment_cheque_no'          => '',
            'payment_cheque_date'        => '',
            'account_id'                 => '',
            'payment_note'               => '',
            'payment_status'             => '',//'paid', 'due', 'partial', 'overdue'
            'purchase_invoice_id'        => '',
            'payment_invoice_id'         => '',
            'payment_invoice_date'       => '',
            'payment_document'           => '',
            'created_by'                 => '',
        ]);
        if ($validate->fails()) {
        //    return response()->json("Fields Required", 400);
           return redirect()->back()->withErrors($validate);

        }
        $payment_ref_no = $random = Str::random(8); //str_random
        $lastpayment = DB::table('payments')->orderBy('payment_id', 'desc')->limit(1)->first();
        $lastid = (string)$lastpayment->payment_id+1;
        $lastid = substr($lastid, -8);
        $lastid = str_pad($lastid, 8, '0', STR_PAD_LEFT);
        $year = (string)Carbon::now()->year;
        $payment_invoice_id = 'payment-'.$year.'-'.$lastid;
        $payment_type = 'debit';
        //$payment_adds = $request->except('document');
        $payment_amount_paid = $request->payment_amount_paid;
        // $payment_amount_balance = $request->payment_amount_paid;

        $supplier_id = $request->payment_supplier_id;
        $getsupplier = DB::table('suppliers')->where('supplier_id','=', $supplier_id)->first();

        // $supplier_amount_recieved = $request->supplier_amount_paid;
        // $supplier_amount_dues = $request->supplier_amount_dues;
        $supplier_amount_recieved = $getsupplier->supplier_balance_paid;
        $supplier_amount_dues = $getsupplier->supplier_balance_dues;

        $searchpurchase = NULL;
        if($request->purchase_invoice_id){
            $sale_purch_invoice_id = $request->purchase_invoice_id;
            $searchpurchase = DB::table('purchases')->where('purchase_invoice_id', $sale_purch_invoice_id)->first();
        }

        // dd($searchpurchase);
        if($payment_amount_paid > $supplier_amount_dues){
            if($searchpurchase !== NULL){
                $purchase_amount_recieved = $searchpurchase->purchase_amount_paid + $payment_amount_paid;
                $purchase_amount_dues = $searchpurchase->purchase_amount_dues - $payment_amount_paid;
            }
            $supplier_amount_recieved = $supplier_amount_recieved + $payment_amount_paid;
            $supplier_amount_dues = $supplier_amount_dues - $payment_amount_paid;
            // $payment_amount_balance = $payment_amount_balance - $payment_amount_paid;
        }
        else{
            if($searchpurchase !== NULL){
                $purchase_amount_recieved = $searchpurchase->purchase_amount_paid + $payment_amount_paid;
                $purchase_amount_dues = $searchpurchase->purchase_amount_dues - $payment_amount_paid;
            }
            $supplier_amount_recieved = $supplier_amount_recieved + $payment_amount_paid;
            $supplier_amount_dues = $supplier_amount_dues - $payment_amount_paid;
            // // $payment_amount_balance = $payment_amount_balance - $payment_amount_paid;
        }

        if($searchpurchase !== NULL){
            $purchase_edits = array(
                'purchase_amount_paid' => $purchase_amount_recieved,
                'purchase_amount_dues' => $purchase_amount_dues,
            );
            $update_purchase = DB::table('purchases')->where('purchase_invoice_id', '=', $sale_purch_invoice_id)->update($purchase_edits);
        }


        $supplier_id = $request->payment_supplier_id;
        // $supplier_name = $request->payment_supplier_name;

        $supplier_edits = array(
            'supplier_balance_paid' 	=> $supplier_amount_recieved,
            'supplier_balance_dues' 	=> $supplier_amount_dues,
            // 'supplier_total_balance'    => $request->supplier_total_balance,
        );

        $update = DB::table('suppliers')->where('supplier_id','=', $supplier_id)->update($supplier_edits);
        $purchase_data = DB::table('purchases')->where('purchase_invoice_id','=', $request->purchase_invoice_id)->first();

        // dd($purchase_data);
        if($purchase_data !== NULL){
            $purchase_id = $purchase_data->purchase_id;
        }
        else{
            $purchase_id = NULL;
        }

        $payment_adds = array(
            'payment_ref_no'           => $payment_ref_no,
            'payment_type'             => $request->payment_type,
            'purchase_id'              => $purchase_id,
            'payment_supplier_id'      => $request->payment_supplier_id,
            // 'payment_status'           => $request->payment_status,
            'payment_status'           => 'done',
            'payment_note'             => $request->payment_note,
            'payment_amount_paid'      => $payment_amount_paid,
            // 'payment_amount_balance'   => $payment_amount_balance,
            'supplier_amount_recieved' => $supplier_amount_recieved,
            'supplier_amount_dues'     => $supplier_amount_dues,
            'payment_method'           => $request->payment_method,
            'payment_cheque_no'        => $request->payment_cheque_no,
            'payment_cheque_date'      => $request->payment_cheque_date,
            // 'payment_document'         => $request->payment_document,
            // 'account_id'               => $request->account_id,
            'sale_purch_invoice_id'    => $request->purchase_invoice_id,
            'payment_invoice_id'       => $payment_invoice_id,
            'payment_invoice_date'     => $request->payment_invoice_date,
            // 'payment_date'             => $request->payment_date,
            'payment_created_by' 	   => Auth::user()->id,
            'created_at'	 		   => date('Y-m-d h:i:s'),
        );
        $document = $request->payment_document;
        if($document){
            $v = Validator::make([
                    'extension' => strtolower($request->payment_document->getClientOriginalExtension()),
                ],
                [
                    'extension' => 'in:pdf,csv,docx,pptx,xlsx,txt',
            ]);
            if($v->fails()) {
                return redirect()->back()->withErrors($v->errors());
            }
            $documentName = $document->getClientOriginalName();
            // dd($documentName);
            // $document->move('public/documents/payment', $documentName);
            Storage::disk('documents')->put('/', $document);
            // Storage::putFile('documents', $document, $documentName);
            $payment_adds['payment_document'] = $documentName;
        }

        $save = DB::table('payments')->insert($payment_adds);
        // dd($save);
        $this_payment_id = DB::getPdo()->lastInsertId();
        // $add_id = DB::table('payments')->insertGetId($payment_adds)

        if($purchase_data !== NULL){
            $warehouse_data = Warehouse::where('warehouse_id', $purchase_data->warehouse_id)->first();
        }else{
            $warehouse_data = Warehouse::where('warehouse_id', NULL)->first();
        }
        $user_data = User::where('id', Auth::user()->id)->first();
        $supplier_data = Supplier::where('supplier_id', $request->payment_supplier_id)->first();
        $payment_data = Payment::where('payment_id', $this_payment_id)->first();

        return view('purchases.paymentinvoice', compact('user_data', 'warehouse_data', 'supplier_data', 'payment_data',));

        // Session::flash('message' , 'Payment Created Successfully');
        // return redirect('purchase/payment');
        // // return redirect()->back();
        // if($save){
		// 	return response()->json(['data' => $payment_adds, 'message' => 'Payment Created Successfully'], 200);
		// }else{
		// 	return response()->json("Oops! Something Went Wrong", 400);
		// }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
