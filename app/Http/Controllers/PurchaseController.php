<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductBarcodes;
use App\Models\Payment;
use App\Models\Company;
use App\Models\PurchaseProducts;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnProducts;
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

class PurchaseController extends Controller
{
    /**
     * Display a listing of the purchases
     *
     * @param  \App\Purchase  $model
     * @return \Illuminate\View\View
     */
    public function index(Purchase $model, Supplier $model2)
    {
        // $purchases = $model->paginate(15)->items();
        $purchases = Purchase::join('suppliers', 'purchases.purchase_supplier_id', '=', 'suppliers.supplier_id')->get();
        $suppliers = Supplier::where('status_id', 1)->get();

        return view('purchases.index', compact('purchases', 'suppliers') );
        // return view('purchases.index', ['purchases' => $purchases]);
    }
    public function getRowDetailsData()
    {
        // $purchases = Purchase::all();
        $purchases = Purchase::join('suppliers', 'purchases.purchase_supplier_id', '=', 'suppliers.supplier_id')->join('users', 'purchases.purchase_created_by', '=', 'users.id')->select('purchases.*', 'suppliers.supplier_name', 'users.name')->get();
        $suppliers = Supplier::where('status_id', 1)->get();
        // dd($purchases);
        return Datatables::of($purchases)
        ->addIndexColumn()
        ->addColumn('action', function ($purchases) {
            return '<a type="button" href="purchase/'. $purchases->purchase_id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
        })
        // ->editColumn('purchase_id', '{{$purchase_id}}')
        ->make(true);
    }

    public function return(PurchaseReturn $model, Supplier $model2)
    {
        // $purchasereturns = PurchaseReturn::join('purchases', 'purchase_returns.purchase_id', '=', 'purchases.purchase_id')->get();
        $purchasereturns = PurchaseReturn::join('suppliers', 'purchase_returns.purchase_return_supplier_id', '=', 'suppliers.supplier_id')->get();
        $suppliers = Supplier::where('status_id', 1)->get();

        return view('purchases.return', compact('purchasereturns', 'suppliers') );
    }
    public function getRowDetailsData2()
    {
        // $purchases = Purchase::all();
        $purchasereturns = PurchaseReturn::join('suppliers', 'purchase_returns.purchase_return_supplier_id', '=', 'suppliers.supplier_id')->join('users', 'purchase_returns.purchase_return_returned_by', '=', 'users.id')->select('purchase_returns.*', 'suppliers.supplier_name', 'users.name')->get();
        $suppliers = Supplier::where('status_id', 1)->get();
        // dd($purchases);
        return Datatables::of($purchasereturns)
        ->addIndexColumn()
        ->addColumn('action', function ($purchasereturns) {
            return '<a type="button" href="purchase_return/'.$purchasereturns->purchase_return_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>';
        })
        ->make(true);
    }

    public function returnadd(PurchaseReturn $model, Supplier $model2, Product $model3)
    {
        $purchasereturns = PurchaseReturn::all();
        $suppliers = Supplier::where('status_id', 1)->get();
        $products = Product::where('status_id', 1)->get();
        $attachedbarcodes = ProductBarcodes::get();

        return view('purchases.returnadd', compact('purchasereturns', 'suppliers', 'products', 'attachedbarcodes') );
    }

    public function return_view($id)
    {
        $j = 1;
        $total_quantity = 0;
        $total_discount = 0;
        $subtotal_amount = 0;
        $grandtotal_amount = 0;
        $purchase_return = DB::table('purchase_returns')->where('purchase_return_id', $id)->first();
        $s_id = $purchase_return->purchase_return_supplier_id;
        $supplier = DB::table('suppliers')->where('supplier_id','=', $s_id)->first();
        $suppliers = Supplier::where('status_id', 1)->get();
        $products = Product::where('status_id', 1)->get();
        $attachedbarcodes = ProductBarcodes::get();

        $purchasereturnproducts = PurchaseReturnProducts::where('purchase_return_id', $id)->orderBy('purchasereturn_products_id', 'desc')->get();

        return view('purchases.returnview', compact('purchase_return', 'suppliers', 'products', 'purchasereturnproducts', 'supplier', 'attachedbarcodes') );//'selectedproducts'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Purchase $model, Supplier $model2, Product $model3)
    {
        $purchases = Purchase::all();
        $suppliers = Supplier::where('status_id', 1)->get();
        $products = Product::where('status_id', 1)->get();
        $attachedbarcodes = ProductBarcodes::get();

        return view('purchases.add', compact('purchases', 'suppliers', 'products', 'attachedbarcodes') );
        // return view('purchases.add', ['purchases' => $model->paginate(15)->items(), 'suppliers' => $model2->paginate(15)->items(), 'products' => $model3->paginate(15)->items()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ledger_old(Purchase $model)
    {
        // $purchases = $model->paginate(15)->items();
        $suppliers = Supplier::where('status_id', 1)->get();
        $payments = Payment::all();

        return view('purchases.ledger', compact('payments', 'suppliers', ) );
        // return view('purchases.ledger', ['payments' => $payments, 'suppliers' => $suppliers,]);
    }
    public function getLedgerData(Request $request)
    {
        // $payments = Payment::all();
        $supplier_id = $request->supplier_id;
        // $supplier_id = $request->purchase_supplier_id;

        // $payments = Payment::where('payment_supplier_id', $supplier_id)
        // ->join('purchases', 'payments.payment_supplier_id', '=', 'purchases.purchase_supplier_id')
        // // ->join('purchase_returns', 'payments.payment_supplier_id', '=', 'purchase_returns.purchase_return_supplier_id')
        // ->join('suppliers', 'payments.payment_supplier_id', '=', 'suppliers.supplier_id')
        // ->orderBy('payments.created_at', 'desc')
        // ->select('payments.*', 'suppliers.supplier_name', 'purchases.*')
        // ->get();

        $suppliers = Supplier::where('supplier_id', $supplier_id)
        ->join('purchases', 'suppliers.supplier_id', '=', 'purchases.purchase_supplier_id')
        ->select('suppliers.supplier_name', 'purchase_invoice_id', 'purchase_invoice_date', 'purchase_id', 'purchase_total_price', 'purchase_amount_paid', 'purchase_amount_dues', 'purchase_payment_method', 'purchase_payment_type', 'purchase_payment_cheque', 'purchases.supplier_balance_dues');

        $suppliers2 = Supplier::where('supplier_id', $supplier_id)
        ->join('payments', 'suppliers.supplier_id', '=', 'payments.payment_supplier_id',)
        ->select('suppliers.supplier_name', 'payment_invoice_id', 'payment_invoice_date', 'purchase_id', 'sale_purch_invoice_id', 'payment_amount_paid', 'payment_amount_balance', 'payment_method', 'payment_type', 'payment_cheque_no', 'supplier_amount_dues');

        $suppliers3 = Supplier::where('supplier_id', $supplier_id)
        ->join('purchase_returns', 'suppliers.supplier_id', '=', 'purchase_returns.purchase_return_supplier_id')
        ->select('suppliers.supplier_name', 'purchase_return_invoice_id', 'purchase_return_invoice_date', 'purchase_id', 'purchase_return_total_price', 'purchase_return_amount_paid', 'purchase_return_amount_dues', 'purchase_return_payment_method', 'purchase_return_payment_type', 'purchase_return_payment_cheque', 'purchase_returns.supplier_balance_dues');

        $merged = $suppliers2->union($suppliers)->union($suppliers3)->get();

        // $suppliers = Supplier::where('status_id', 1)->get();
        return Datatables::of($merged)
        ->addIndexColumn()
        ->make(true);
    }
    public function ledger(Request $request)
    {
    	$data = $request->all();
        if($data != [ ]){
            $supplier_id = $data['purchase_supplier_id'];
            // $start_date = $data['start_date'];
            // $end_date = $data['end_date'];
        }
        else
        {
            $supplier_id = 0;
            // $start_date = '';
            // $end_date = '';
        }

        $payments = Payment::where('payment_supplier_id', 9999)->get();

        $suppliers = Supplier::where('status_id', 1)->get();

        return view('purchases.ledger', compact('payments','supplier_id', 'suppliers',));
    }

    public function available()
    {
        $purchases = Purchase::all();
        $suppliers = Supplier::where('status_id', 1)->get();
        $products = Product::all();
        $companies = Company::all();
        // $payments = Payment::get();

        return view('purchases.available', compact('purchases', 'suppliers', 'products', 'companies') );
        // return view('purchases.available', ['purchases' => $purchases, 'suppliers' => $suppliers, 'payments' => $payments]);
    }
    public function getAvailableData()
    {
        $products = Product::all();

        return Datatables::of($products)
        ->addIndexColumn()
        ->with('total_quantity_available', $products->sum('product_quantity_available'))
        ->make(true);

    }

    public function availableprint(Request $request)
    {
        $product_company = $request->product_company;
        if($product_company == ""){
            $products = Product::all();
        }
        else{
            $products = Product::where('product_company', $product_company)->get();
        }
        $suppliers = Supplier::where('status_id', 1)->get();
        $warehouse_data = Warehouse::where('warehouse_id', 1)->first();

        return view('purchases.availableprint', compact('suppliers', 'products', 'warehouse_data', ) );
    }

    public function minimum()
    {
        $purchases = Purchase::all();
        $suppliers = Supplier::where('status_id', 1)->get();
        $products = Product::all();
        $companies = Company::all();

        return view('purchases.minimum', compact('purchases', 'suppliers', 'products', 'companies') );
    }
    public function getMinimumData()
    {
        $products = Product::all();

        return Datatables::of($products)
        ->addIndexColumn()
        ->make(true);
    }

    public function minimumprint(Request $request)
    {
        $product_company = $request->product_company;
        if($product_company == ""){
            $products = Product::all();
        }
        else{
            $products = Product::where('product_company', $product_company)->get();
        }
        $suppliers = Supplier::where('status_id', 1)->get();
        $warehouse_data = Warehouse::where('warehouse_id', 1)->first();

        return view('purchases.minimumprint', compact('suppliers', 'products', 'warehouse_data', ) );
    }

    public function damage()
    {
        $purchases = Purchase::all();
        $suppliers = Supplier::where('status_id', 1)->get();
        $products = Product::all();
        $companies = Company::all();

        return view('purchases.damage', compact('purchases', 'suppliers', 'products', 'companies') );
    }
    public function getDamageData()
    {
        $products = Product::all();

        return Datatables::of($products)
        ->addIndexColumn()
        ->addColumn('action', function ($products) {
            return '<a type="button" href="/product/'. $products->product_id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function damageprint(Request $request)
    {
        $product_company = $request->product_company;
        if($product_company == ""){
            $products = Product::all();
        }
        else{
            $products = Product::where('product_company', $product_company)->get();
        }
        $suppliers = Supplier::where('status_id', 1)->get();
        $warehouse_data = Warehouse::where('warehouse_id', 1)->first();

        return view('purchases.damageprint', compact('suppliers', 'products', 'warehouse_data', ) );
    }

    public function amountwise()
    {
        $purchases = Purchase::all();
        $suppliers = Supplier::where('status_id', 1)->get();
        $products = Product::all();
        // $payments = Payment::get();

        return view('purchases.amountwise', compact('purchases', 'suppliers', 'products') );
        // return view('purchases.amountwise', ['purchases' => $purchases, 'suppliers' => $suppliers, 'payments' => $payments]);
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
            'purchase_supplier_id'         => '',
            'purchase_supplier_name'       => '',
            'purchase_total_items'         => '',//'purchase_product_items'
            'purchase_total_qty'           => '',//'purchase_product_quantity'
            'purchase_free_piece'          => '',
            'purchase_free_amount'         => '',
            'purchase_status'              => '',
            'purchase_note'                => '',
            // 'purchase_date'                => '',
            'purchase_total_price'         => '',
            'purchase_add_amount'          => '',
            'purchase_discount'            => '',
            'purchase_grandtotal_price'    => '',
            'purchase_total_amount_paid'   => '',
            'purchase_total_amount_dues'   => '',
            'purchase_payment_method'      => '',
            'purchase_payment_status'      => '',
            'purchase_document'            => '',
            'purchase_invoice_id'          => '',
            'purchase_invoice_date'        => '',
            'purchase_added_by'            => '',
            // 'purchase_payment_id'          => '',
            'warehouse_id'                 => '',
        ]);
        if ($validate->fails()) {
        //    return response()->json("Fields Required", 400);
           return redirect('purchase/create')->withErrors($validate);
        //    return response()->withErrors($validate);
        }
        $purchase_ref_no = $random = Str::random(8); //str_random
        $lastpurchase = DB::table('purchases')->orderBy('purchase_id', 'desc')->limit(1)->first();
        if($lastpurchase == NULL){
            $lastid = (string)1;
        }else{
            $lastid = (string)$lastpurchase->purchase_id+1;
        }
        $lastid = substr($lastid, -8);
        $lastid = str_pad($lastid, 8, '0', STR_PAD_LEFT);
        $year = (string)Carbon::now()->year;
        $purchase_invoice_id = 'purchase-'.$year.'-'.$lastid;
        //$purchase_adds = $request->except('document');
        //$purchase_adds['ref_no'] = 'pr-' . date("Ymd") . '-'. date("his");
        $purchase_grandtotal_price = $request->purchase_grandtotal_price;
        $purchase_amount_received = $request->purchase_amount_received;
        $supplier_amount_paid = $request->purchase_amount_paid;
        $supplier_amount_dues = $request->purchase_amount_dues;
        $purchase_amount_dues = $purchase_grandtotal_price;

        if($purchase_amount_received > $purchase_grandtotal_price){
            $supplier_amount_paid = $supplier_amount_paid + $purchase_amount_received;
            $supplier_amount_dues = $supplier_amount_dues - ($purchase_amount_received - $purchase_grandtotal_price);
            $purchase_amount_dues = $purchase_grandtotal_price - $purchase_amount_received;
            $purchase_status = 'received';
            $purchase_payment_status = 'paid';
        }else{
            $supplier_amount_paid = $supplier_amount_paid + $purchase_amount_received;
            $supplier_amount_dues = $supplier_amount_dues + ($purchase_grandtotal_price - $purchase_amount_received);
            $purchase_amount_dues = $purchase_grandtotal_price - $purchase_amount_received;
            $purchase_status = 'pending';
            $purchase_payment_status = 'partial';
        }

        if($request->product_name !== NULL){

            $supplier_id = $request->purchase_supplier_id;
            $supplier_name = $request->purchase_supplier_name;
            $supplier_edits = array(
                'supplier_balance_paid' 	=> $supplier_amount_paid,
                'supplier_balance_dues' 	=> $supplier_amount_dues,
                // 'supplier_total_balance'    => $request->supplier_total_balance,
            );

            $update = DB::table('suppliers')->where('supplier_id','=', $supplier_id)->update($supplier_edits);

            $userwarehouse = DB::table('user_warehouses')->where('user_id', Auth::user()->id)->get()->toArray();

            $purchase_adds = array(
                'purchase_ref_no'           => $purchase_ref_no,
                'purchase_supplier_id'      => $request->purchase_supplier_id,
                'purchase_total_items'      => $request->purchase_total_items,//'purchase_product_items'
                'purchase_total_quantity'   => $request->purchase_total_qty,//'purchase_product_quantity'
                'purchase_free_piece'       => $request->purchase_free_piece,
                'purchase_free_amount'      => $request->purchase_free_amount,
                'purchase_status'           => $purchase_status,
                'purchase_note'             => $request->purchase_note,
                // 'purchase_date'             => $request->purchase_date,
                'purchase_total_price'      => $request->purchase_total_price,
                'purchase_add_amount'       => $request->purchase_add_amount,
                'purchase_discount'         => $request->purchase_discount,
                'purchase_grandtotal_price' => $purchase_grandtotal_price,
                'purchase_amount_paid'      => $purchase_amount_received,
                'purchase_amount_dues'      => $purchase_amount_dues,
                'supplier_balance_dues'     => $supplier_amount_dues,
                'purchase_payment_method'   => $request->purchase_payment_method,
                'purchase_payment_status'   => $purchase_payment_status,
                'purchase_document'         => $request->purchase_document,
                'purchase_invoice_id'       => $purchase_invoice_id,
                'purchase_invoice_date'     => $request->purchase_invoice_date,
                // 'purchase_payment_id'       => $request->purchase_payment_id,
                'warehouse_id'              => $userwarehouse[0]->warehouse_id,
                'purchase_created_by' 	    => Auth::user()->id,
                'created_at'	 			=> date('Y-m-d h:i:s'),
            );
            $document = $request->purchase_document;
            if($document){
                $v = Validator::make([
                        'extension' => strtolower($request->purchase_document->getClientOriginalExtension()),
                    ],
                    [
                        'extension' => 'in:pdf,csv,docx,pptx,xlsx,txt',
                ]);
                if($v->fails()) {
                    return redirect()->back()->withErrors($v->errors());
                }
                $documentName = $document->getClientOriginalName();
                // dd($documentName);
                // $document->move('public/documents/purchase', $documentName);
                Storage::disk('documents')->put('/', $document);
                // Storage::putFile('documents', $document, $documentName);
                $purchase_adds['purchase_document'] = $documentName;
            }

            $product_barcodes = $request->purchase_products_barcode;
            // $product_warehouses = $request->purchase_products_warehouse;
            $product_names = $request->product_name;
            $product_codes = $request->product_code;
            $product_ids = $request->product_id;
            $products_pieces = $request->purchase_products_pieces;
            $pieces_per_packet = $request->purchase_pieces_per_packet;
            $products_packets = $request->purchase_products_packets;
            $packets_per_carton = $request->purchase_packets_per_carton;
            $products_cartons = $request->purchase_products_cartons;
            $pieces_per_carton = $request->purchase_pieces_per_carton;
            $products_unit_prices = $request->purchase_products_unit_price;
            $products_discounts = $request->purchase_products_discount;
            $products_sub_totals = $request->purchase_products_sub_total;

            $save = DB::table('purchases')->insert($purchase_adds);
            $id = DB::getPdo()->lastInsertId();
            // $add_id = DB::table('purchases')->insertGetId($purchase_adds)

            foreach($product_ids as $key => $single_id){

                $products_quantity_pieces[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));
                $products_quantity_packets[$key] = ($products_pieces[$key]/$pieces_per_packet[$key])+$products_packets[$key]+($products_cartons[$key]*($packets_per_carton[$key]));
                $products_quantity_cartons[$key] = ($products_pieces[$key]/$pieces_per_carton[$key])+($products_packets[$key]/$packets_per_carton[$key])+$products_cartons[$key];
                $products_quantity_total[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));

                $product[$key] = DB::table('products')->where('product_id','=', $single_id)->first();
                if(!empty($product[$key])){
                    $warehouse_id = $product[$key]->warehouse_id;
                }
                else{
                    $warehouse_id = NULL;
                }

                $purchase_product_adds[$key] = array(
                    'purchase_id'                    => $id,
                    'product_id'                     => $single_id,
                    'purchase_product_ref_no'        => $product_codes[$key],
                    'purchase_product_name'          => $product_names[$key],
                    'purchase_product_barcode'       => $product_barcodes[$key],
                    'warehouse_id'                   => $warehouse_id,
                    'purchase_piece_per_packet'      => $pieces_per_packet[$key],
                    'purchase_packet_per_carton'     => $packets_per_carton[$key],
                    'purchase_piece_per_carton'      => $pieces_per_carton[$key],
                    'purchase_pieces_number'         => $products_pieces[$key],
                    'purchase_packets_number'        => $products_packets[$key],
                    'purchase_cartons_number'        => $products_cartons[$key],
                    'purchase_pieces_total'          => $products_quantity_pieces[$key],
                    'purchase_packets_total'         => $products_quantity_packets[$key],
                    'purchase_cartons_total'         => $products_quantity_cartons[$key],
                    'purchase_quantity_total'        => $products_quantity_total[$key],
                    'purchase_trade_discount'        => $products_discounts[$key],
                    'purchase_trade_price_piece'     => $products_unit_prices[$key],
                    'purchase_trade_price_packet'    => $products_unit_prices[$key]*$pieces_per_packet[$key],
                    'purchase_trade_price_carton'    => $products_unit_prices[$key]*$pieces_per_carton[$key],
                    'purchase_product_sub_total'     => $products_sub_totals[$key]
                );
                $purchase_products_save = DB::table('purchase_products')->insert($purchase_product_adds[$key]);
            }

            foreach($product_ids as $key => $single_id){

                $products_quantity_pieces[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));
                $products_quantity_packets[$key] = ($products_pieces[$key]/$pieces_per_packet[$key])+$products_packets[$key]+($products_cartons[$key]*($packets_per_carton[$key]));
                $products_quantity_cartons[$key] = ($products_pieces[$key]/$pieces_per_carton[$key])+($products_packets[$key]/$packets_per_carton[$key])+$products_cartons[$key];
                $products_quantity_total[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));

                $product[$key] = DB::table('products')->where('product_id','=', $single_id)->first();

                $product_edits = array(
                    // 'product_id'                 => $single_id,
                    // 'product_ref_no'                => $product_codes[$key],
                    // 'product_name'                  => $product_names[$key],
                    // 'product_barcode'               => $product_barcodes[$key],
                    // 'warehouse_id'                  => $product_warehouses[$key],
                    // 'product_piece_per_packet'      => $pieces_per_packet[$key],
                    // 'product_piece_per_carton'      => $pieces_per_carton[$key],
                    'product_pieces_total'          => $product[$key]->product_pieces_total+$products_quantity_pieces[$key],
                    'product_pieces_available'      => $product[$key]->product_pieces_available+$products_quantity_pieces[$key],
                    'product_packets_total'         => $product[$key]->product_packets_total+$products_quantity_packets[$key],
                    'product_packets_available'     => $product[$key]->product_packets_available+$products_quantity_packets[$key],
                    'product_cartons_total'         => $product[$key]->product_cartons_total+$products_quantity_cartons[$key],
                    'product_cartons_available'     => $product[$key]->product_cartons_available+$products_quantity_cartons[$key],
                    'product_quantity_total'        => $product[$key]->product_quantity_total+$products_quantity_total[$key],
                    'product_quantity_available'    => $product[$key]->product_quantity_available+$products_quantity_total[$key],
                    // 'product_trade_discount'        => $products_discounts[$key],
                    // 'product_trade_price_piece'     => $products_unit_prices[$key],
                    // 'product_trade_price_packet'    => $products_unit_prices[$key]*$pieces_per_packet[$key],
                    // 'product_trade_price_carton'    => $products_unit_prices[$key]*$pieces_per_carton[$key],
                );
                $update = DB::table('products')->where('product_id','=', $single_id)->update($product_edits);
            }

            $purchase_data = Purchase::where('purchase_id', $id)->first();
            $purchase_products_data = PurchaseProducts::where('purchase_id', $id)->orderBy('purchase_cartons_number', 'desc')->get();
            $user_data = User::where('id', $purchase_data->purchase_created_by)->first();
            $warehouse_data = Warehouse::where('warehouse_id', $purchase_data->warehouse_id)->first();
            $supplier_data = Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->first();
            $payment_data = Payment::where('purchase_id', $id)->get();

            return view('purchases.invoice', compact('purchase_data', 'purchase_products_data', 'user_data', 'warehouse_data', 'supplier_data', 'payment_data',));
            // return redirect('purchase/gen_invoice/'.$id);
            // return redirect('/purchase')->with(['message' => 'Purchase Created Successfully'], 200);
            // if($save){
            // 	return response()->json(['data' => $purchase_adds, 'purchase_products' => $purchase_products_save, 'message' => 'Purchase Created Successfully'], 200);
            // }else{
            // 	return response()->json("Oops! Something Went Wrong", 400);
            // }

        }
        else{
            // return response()->json("Add atleast one product", 400);
            Session::flash('error' , 'Add atleast one product');
            return redirect()->back();
        }
    }

    public function storereturn(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'purchase_id'                       => '',
            'purchase_ref_no'            => '',
            'purchase_supplier_id'       => '',
            'purchase_product_pieces'    => '',
            'purchase_product_packets'   => '',
            'purchase_product_cartons'   => '',
            'purchase_unit_price'        => '',
            'purchase_product_quantity'  => '',
            'purchase_status'            => '',
            'purchase_date'              => '',
            'purchase_total_price'       => '',
            'purchase_grandtotal_price'  => '',
            'purchase_amount_paid'       => '',
            'purchase_amount_dues'       => '',
            'purchase_payment_method'    => '',
            'purchase_payment_status'    => '',
            'purchase_invoice_id'        => '',
            'purchase_invoice_date'      => '',
            'purchase_document'          => '',
            'purchase_note'              => '',
            // 'purchase_return_returned_by'       => '',
        ]);
        if ($validate->fails()) {
        //    return response()->json("Fields Required", 400);
           return redirect('purchase/returnadd')->withErrors($validate);
        }
        $purchase_return_ref_no = $random = Str::random(8); //str_random
        $lastpurchasereturn = DB::table('purchase_returns')->orderBy('purchase_return_id', 'desc')->limit(1)->first();
        if($lastpurchasereturn == NULL){
            $lastid = (string)1;
        }else{
            $lastid = (string)$lastpurchasereturn->purchase_return_id+1;
        }
        $lastid = substr($lastid, -8);
        $lastid = str_pad($lastid, 8, '0', STR_PAD_LEFT);
        $year = (string)Carbon::now()->year;
        $purchase_return_invoice_id = 'p.return-'.$year.'-'.$lastid;
        //$purchase_adds = $request->except('document');
        $purchase_return_grandtotal_price = $request->purchase_grandtotal_price;
        $purchase_return_amount_received = $request->purchase_amount_recieved;
        $supplier_return_amount_paid = $request->purchase_amount_paid;
        $supplier_return_amount_dues = $request->purchase_amount_dues;
        $purchase_return_amount_dues = $purchase_return_grandtotal_price;

        if($purchase_return_amount_received > $purchase_return_grandtotal_price){
            $supplier_return_amount_paid = $supplier_return_amount_paid - $purchase_return_grandtotal_price;
            $supplier_return_amount_dues = $supplier_return_amount_dues + ($purchase_return_amount_received - $purchase_return_grandtotal_price);
            $purchase_return_amount_dues = $purchase_return_amount_received - $purchase_return_grandtotal_price;
        }
        else{
            $supplier_return_amount_paid = $supplier_return_amount_paid - $purchase_return_amount_received;
            $supplier_return_amount_dues = $supplier_return_amount_dues - ($purchase_return_grandtotal_price - $purchase_return_amount_received);
            $purchase_return_amount_dues = $purchase_return_grandtotal_price - $purchase_return_amount_received;
        }

        if($request->product_name !== NULL){

            $supplier_id = $request->purchase_supplier_id;
            $supplier_name = $request->purchase_supplier_name;
            $supplier_edits = array(
                'supplier_balance_paid' 	=> $supplier_return_amount_paid,
                'supplier_balance_dues' 	=> $supplier_return_amount_dues,
                // 'supplier_total_balance'    => $request->supplier_total_balance,
            );

            $update = DB::table('suppliers')->where('supplier_id','=', $supplier_id)->update($supplier_edits);

            $purchase = DB::table('purchases')->where('purchase_invoice_id','=', $request->purchase_invoice_id)->first();
            if($purchase !== NULL){
                $purchase_id = $purchase->purchase_id;
            }
            else{
                $purchase_id = NULL;
            }

            // $purchase_status = $request->purchase_status;
            $purchase_status = 'received';
            // $purchase_payment_status = $request->purchase_payment_status;
            $purchase_payment_status = 'paid';

            $purchasereturn_adds = array(
                'purchase_return_ref_no'           => $purchase_return_ref_no,
                'purchase_id'                      => $purchase_id,
                'purchase_return_supplier_id'      => $request->purchase_supplier_id,
                'purchase_return_total_items'      => $request->purchase_total_items,//'purchase_product_items'
                'purchase_return_total_quantity'   => $request->purchase_total_qty,//'purchase_product_quantity'
                'purchase_return_free_piece'       => $request->purchase_free_piece,
                'purchase_return_free_amount'      => $request->purchase_free_amount,
                'purchase_return_status'           => $purchase_status,
                'purchase_return_date'             => $request->purchase_invoice_date,
                'purchase_return_total_price'      => $request->purchase_total_price,
                'purchase_return_add_amount'       => $request->purchase_add_amount,
                'purchase_return_discount'         => $request->purchase_discount,
                'purchase_return_grandtotal_price' => $purchase_return_grandtotal_price,
                'purchase_return_amount_paid'      => $purchase_return_amount_received,
                'purchase_return_amount_dues'      => $purchase_return_amount_dues,
                'supplier_balance_dues'            => $supplier_return_amount_dues,
                'purchase_return_payment_method'   => $request->purchase_payment_method,
                'purchase_return_payment_status'   => $purchase_payment_status,
                'purchase_return_invoice_id'       => $purchase_return_invoice_id,//$request->purchase_invoice_id,
                'purchase_return_invoice_date'     => $request->purchase_invoice_date,
                'purchase_return_document'         => $request->purchase_document,
                'purchase_return_note'             => $request->purchase_note,
                'purchase_return_returned_by' 	   => Auth::user()->id,
                'created_at'	 			       => date('Y-m-d h:i:s'),
            );

            $document = $request->purchase_document;
            if($document){
                $v = Validator::make([
                        'extension' => strtolower($request->purchase_document->getClientOriginalExtension()),
                    ],
                    [
                        'extension' => 'in:pdf,csv,docx,pptx,xlsx,txt',
                ]);
                if($v->fails()) {
                    return redirect()->back()->withErrors($v->errors());
                }
                $documentName = $document->getClientOriginalName();
                // dd($documentName);
                // $document->move('public/documents/purchase', $documentName);
                Storage::disk('documents')->put('/', $document);
                // Storage::putFile('documents', $document, $documentName);
                $purchase_adds['purchase_document'] = $documentName;
            }

            $product_barcodes = $request->purchase_products_barcode;
            // $product_warehouses = $request->purchase_products_warehouse;
            $product_names = $request->product_name;
            $product_codes = $request->product_code;
            $product_ids = $request->product_id;
            $products_pieces = $request->purchase_products_pieces;
            $pieces_per_packet = $request->purchase_pieces_per_packet;
            $products_packets = $request->purchase_products_packets;
            $packets_per_carton = $request->purchase_packets_per_carton;
            $products_cartons = $request->purchase_products_cartons;
            $pieces_per_carton = $request->purchase_pieces_per_carton;
            $products_unit_prices = $request->purchase_products_unit_price;
            $products_discounts = $request->purchase_products_discount;
            $products_sub_totals = $request->purchase_products_sub_total;

            $save = DB::table('purchase_returns')->insert($purchasereturn_adds);
            $id = DB::getPdo()->lastInsertId();
            // $add_id = DB::table('purchases')->insertGetId($purchase_adds)

            foreach($product_ids as $key => $single_id){

                $products_quantity_total[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));
                $products_quantity_available[$key] = $products_quantity_total[$key];

                $product[$key] = DB::table('products')->where('product_id','=', $single_id)->first();

                $purchasereturn_product_adds[$key] = array(
                    'purchase_return_id'                   => $id,
                    'product_id'                           => $single_id,
                    'purchasereturn_product_ref_no'        => $product_codes[$key],
                    'purchasereturn_product_name'          => $product_names[$key],
                    'purchasereturn_product_barcode'       => $product_barcodes[$key],
                    'warehouse_id'                         => $product[$key]->warehouse_id,
                    'purchasereturn_piece_per_packet'      => $pieces_per_packet[$key],
                    'purchasereturn_packet_per_carton'     => $packets_per_carton[$key],
                    'purchasereturn_piece_per_carton'      => $pieces_per_carton[$key],
                    'purchasereturn_pieces_total'          => $products_pieces[$key],
                    'purchasereturn_packets_total'         => $products_packets[$key],
                    'purchasereturn_cartons_total'         => $products_cartons[$key],
                    'purchasereturn_quantity_total'        => $products_quantity_total[$key],
                    'purchasereturn_trade_discount'        => $products_discounts[$key],
                    'purchasereturn_trade_price_piece'     => $products_unit_prices[$key],
                    'purchasereturn_trade_price_packet'    => $products_unit_prices[$key]*$pieces_per_packet[$key],
                    'purchasereturn_trade_price_carton'    => $products_unit_prices[$key]*$pieces_per_carton[$key],
                    'purchasereturn_product_sub_total'     => $products_sub_totals[$key]
                );
                $purchasereturn_products_save = DB::table('purchasereturn_products')->insert($purchasereturn_product_adds[$key]);
            }

            foreach($product_ids as $key => $single_id){

                $products_quantity_total[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));
                $products_quantity_available[$key] = $products_quantity_total[$key];

                $product[$key] = DB::table('products')->where('product_id','=', $single_id)->first();

                // dd($products_quantity_available[$key]);
                $product_edits = array(
                    // 'product_id'                 => $single_id,
                    // 'product_ref_no'                => $product_codes[$key],
                    // 'product_name'                  => $product_names[$key],
                    // 'product_barcode'               => $product_barcodes[$key],
                    // 'warehouse_id'                  => $product_warehouses[$key],
                    // 'product_piece_per_packet'      => $pieces_per_packet[$key],
                    // 'product_piece_per_carton'      => $pieces_per_carton[$key],
                    'product_pieces_total'          => $product[$key]->product_pieces_total-$products_pieces[$key],
                    'product_pieces_available'      => $product[$key]->product_pieces_available-$products_pieces[$key],
                    'product_packets_total'         => $product[$key]->product_packets_total-$products_packets[$key],
                    'product_packets_available'     => $product[$key]->product_packets_available-$products_packets[$key],
                    'product_cartons_total'         => $product[$key]->product_cartons_total-$products_cartons[$key],
                    'product_cartons_available'     => $product[$key]->product_cartons_available-$products_cartons[$key],
                    'product_quantity_total'        => $product[$key]->product_quantity_total-$products_quantity_total[$key],
                    'product_quantity_available'    => $product[$key]->product_quantity_available-$products_quantity_available[$key],
                    // 'product_trade_discount'        => $products_discounts[$key],
                    // 'product_trade_price_piece'     => $products_unit_prices[$key],
                    // 'product_trade_price_packet'    => $products_unit_prices[$key]*$pieces_per_packet[$key],
                    // 'product_trade_price_carton'    => $products_unit_prices[$key]*$pieces_per_carton[$key],
                );
                $update = DB::table('products')->where('product_id','=', $single_id)->update($product_edits);
            }

            // return redirect()->back();
            Session::flash('message' , 'Purchase Returned Successfully');
            return redirect('/purchase/return');
            // ->with(['message' => 'Purchase Returned Successfully'], 200);

            // if($save){
            // 	return response()->json(['data' => $purchasereturn_adds, 'purchasereturn_products' => $purchasereturn_products_save, 'message' => 'Purchase Returned Successfully'], 200);
            // }else{
            // 	return response()->json("Oops! Something Went Wrong", 400);
            // }
        }
        else{
            // return response()->json("Add atleast one product", 400);
            Session::flash('error' , 'Add atleast one product');
            return redirect()->back();

        }

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
    public function edit(Purchase $model, $id, Supplier $model2, Product $model3, PurchaseProducts $model4)
    {
        $j = 1;
        $total_quantity = 0;
        $total_discount = 0;
        $subtotal_amount = 0;
        $grandtotal_amount = 0;
        // $s_name = $model->paginate(15)->items()[$id-1]->supplier_name;
        // $s_id = $model->paginate(15)->items()[$id-1]->purchase_supplier_id;
        // $supplier = DB::table('suppliers')->where('supplier_id','=', $s_id)->first();
        // $purchase = $model->paginate(15)->items()[$id-1];
        $purchase = DB::table('purchases')->where('purchase_id', $id)->first();
        $s_id = $purchase->purchase_supplier_id;
        $supplier = DB::table('suppliers')->where('supplier_id','=', $s_id)->first();
        $suppliers = Supplier::where('status_id', 1)->get();
        $products = Product::where('status_id', 1)->get();
        $attachedbarcodes = ProductBarcodes::get();

        $purchaseproducts = PurchaseProducts::where('purchase_id', $id)->orderBy('purchase_products_id', 'desc')->get();

        return view('purchases.edit', compact('purchase', 'suppliers', 'products', 'purchaseproducts', 'supplier', 'attachedbarcodes') );//'selectedproducts'
        // return view('purchases.edit', ['purchases' => $model->paginate(15)->items()[$id-1], 'suppliers' => $model2->paginate(15)->items(), 'products' => $model3->paginate(15)->items()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $purchase_id)
    {
        // $purchase_id = $id; //OR $request->purchase_id;
        $get_purchase = DB::table('purchases')->where('purchase_id', $purchase_id)->first();
        $get_supplier = DB::table('suppliers')->where('supplier_id', $request->purchase_supplier_id)->first();

        $validate = Validator::make($request->all(), [
            'purchase_supplier_id'         => 'required',
            'purchase_supplier_name'       => '',
            'purchase_total_items'         => '',//'purchase_product_items'
            'purchase_total_qty'           => '',//'purchase_product_quantity'
            'purchase_free_piece'          => '',
            'purchase_free_amount'         => '',
            'purchase_status'              => '',
            'purchase_note'                => '',
            // 'purchase_date'                => '',
            'purchase_total_price'         => '',
            'purchase_add_amount'          => '',
            'purchase_discount'            => '',
            'purchase_grandtotal_price'    => '',
            'purchase_total_amount_paid'   => '',
            'purchase_total_amount_dues'   => '',
            'purchase_payment_method'      => '',
            'purchase_payment_status'      => '',
            'purchase_document'            => '',
            'purchase_invoice_id'          => '',
            'purchase_invoice_date'        => '',
            // 'purchase_payment_id'          => '',
            'warehouse_id'                 => '',
        ]);
        if ($validate->fails()) {
        //    return response()->json("Fields Required", 400);
           return redirect()->back()->withErrors($validate);
        }

        $purchase_grandtotal_price = $request->purchase_grandtotal_price;
        $purchase_amount_received = $request->purchase_amount_received;
        $purchase_amount_paid = $request->purchase_amount_paid;
        $purchase_amount_dues = $request->purchase_amount_dues;
        $net_purchase_price = $purchase_grandtotal_price - $purchase_amount_paid;
        $supplier_amount_paid = $request->supplier_balance_paid;
        $supplier_amount_dues = $request->supplier_balance_dues;
        $my_purchase_status = $request->purchase_status;

        $previous_balance = $request->supplier_balance_dues;

        // if($purchase_amount_received >= $get_purchase->purchase_amount_dues){}
        // elseif($purchase_amount_received == 0){}
        // else{}
        $purchase_amount_paid_new = $purchase_amount_paid + $purchase_amount_received;
        $purchase_amount_dues_new = $purchase_amount_dues - $purchase_amount_received;
        $supplier_amount_paid_new = $supplier_amount_paid + $purchase_amount_received;
        // $supplier_amount_dues_new = $supplier_amount_dues - $purchase_amount_received;

        if($purchase_amount_received >= $get_purchase->purchase_amount_dues){
            $supplier_amount_dues_new = $get_supplier->supplier_balance_dues - $purchase_amount_received/*($purchase_amount_received - $get_purchase->purchase_amount_dues)*/;
            $purchase_status = 'received';
            $purchase_payment_status = 'paid';
        }
        elseif($purchase_amount_received == 0){
            $supplier_amount_dues_new = $get_supplier->supplier_balance_dues;
            $purchase_status = 'ordered';//$purchase_status = 'pending';
            $purchase_payment_status = 'due';
        }
        else{
            // $supplier_amount_dues_new = $get_supplier->supplier_balance_dues;
            $supplier_amount_dues_new = $get_supplier->supplier_balance_dues - $purchase_amount_received /*+ ($get_purchase->purchase_amount_dues - $purchase_amount_received)*/;
            $purchase_status = 'ordered';
            $purchase_payment_status = 'partial';
        }

        if($my_purchase_status == 'completed'){
            $purchase_status = 'completed';
        }

        if($request->product_name !== NULL){

            $supplier_id = $request->purchase_supplier_id;
            $supplier_name = $request->purchase_supplier_name;

            $supplier_edits = array(
                'supplier_balance_paid' 	=> $supplier_amount_paid_new,
                'supplier_balance_dues' 	=> $supplier_amount_dues_new,
                // 'supplier_total_balance'    => $request->supplier_total_balance,
            );

            $update1 = DB::table('suppliers')->where('supplier_id','=', $supplier_id)->update($supplier_edits);

            $purchase_edits = array(
                'purchase_supplier_id'      => $request->purchase_supplier_id,
                'purchase_total_items'      => $request->purchase_total_items,//'purchase_product_items'
                'purchase_total_quantity'   => $request->purchase_total_qty,//'purchase_product_quantity'
                'purchase_free_piece'       => $request->purchase_free_piece,
                'purchase_free_amount'      => $request->purchase_free_amount,
                'purchase_status'           => $purchase_status,
                'purchase_note'             => $request->purchase_note,
                // 'purchase_date'          => $request->purchase_date,
                'purchase_total_price'      => $request->purchase_total_price,
                'purchase_add_amount'       => $request->purchase_add_amount,
                'purchase_discount'         => $request->purchase_discount,
                'purchase_grandtotal_price' => $purchase_grandtotal_price,
                'purchase_amount_paid'      => $purchase_amount_paid_new,
                'purchase_amount_dues'      => $purchase_amount_dues_new,
                'supplier_balance_dues'     => $supplier_amount_dues_new,
                'purchase_payment_method'   => $request->purchase_payment_method,
                'purchase_payment_status'   => $purchase_payment_status,
                // 'purchase_document'      => $request->purchase_document,
                // 'purchase_invoice_id'       => $request->purchase_invoice_id,
                // 'purchase_invoice_date'     => $request->purchase_invoice_date,
                // 'purchase_payment_id'       => $request->purchase_payment_id,
                // 'warehouse_id'              => $request->warehouse_id,

            );

            $document = $request->purchase_document;
            if($document){
                $v = Validator::make([
                        'extension' => strtolower($request->purchase_document->getClientOriginalExtension()),
                    ],
                    [
                        'extension' => 'in:pdf,csv,docx,pptx,xlsx,txt',
                ]);
                if($v->fails()) {
                    return redirect()->back()->withErrors($v->errors());
                }
                $documentName = $document->getClientOriginalName();
                // dd($documentName);
                // $document->move('public/documents/purchase', $documentName);
                Storage::disk('documents')->put('/', $document);
                // Storage::putFile('documents', $document, $documentName);
                $purchase_edits['purchase_document'] = $documentName;
            }

            $product_barcodes = $request->purchase_products_barcode;
            // $product_warehouses = $request->purchase_products_warehouse;
            $product_names = $request->product_name;
            $product_codes = $request->product_code;
            $product_ids = $request->product_id;
            $products_pieces = $request->purchase_products_pieces;
            $pieces_per_packet = $request->purchase_pieces_per_packet;
            $products_packets = $request->purchase_products_packets;
            $packets_per_carton = $request->purchase_packets_per_carton;
            $products_cartons = $request->purchase_products_cartons;
            $pieces_per_carton = $request->purchase_pieces_per_carton;
            $products_unit_prices = $request->purchase_products_unit_price;
            $products_discounts = $request->purchase_products_discount;
            $products_sub_totals = $request->purchase_products_sub_total;

            $purchase_products_delete = array();
            $purchase_products_delete = DB::table('purchase_products')->where('purchase_id', $purchase_id)->whereNotIn('product_id', $product_ids)->get();

            foreach($purchase_products_delete as $purchase_product_delete){
                if($purchase_product_delete !== NULL){
                    DB::table('purchase_products')->where('purchase_id', $purchase_id)->where('product_id','=', $purchase_product_delete->product_id)->delete();
                }
            }

            foreach($product_ids as $key => $single_id){

                $products_quantity_pieces[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));
                $products_quantity_packets[$key] = ($products_pieces[$key]/$pieces_per_packet[$key])+$products_packets[$key]+($products_cartons[$key]*($packets_per_carton[$key]));
                $products_quantity_cartons[$key] = ($products_pieces[$key]/$pieces_per_carton[$key])+($products_packets[$key]/$packets_per_carton[$key])+$products_cartons[$key];
                $products_quantity_total[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));

                $product[$key] = DB::table('products')->where('product_id','=', $single_id)->first();

                $purchase_products_get[$key] = DB::table('purchase_products')->where('purchase_id', $purchase_id)->where('product_id','=', $single_id)->first();

                // $purchase_products_delete = DB::table('purchase_products')->where('purchase_id','=', $purchase_id)->delete();

                if($purchase_products_get[$key] == NULL){

                    $purchase_product_adds[$key] = array(
                        'purchase_id'                    => $purchase_id,
                        'product_id'                     => $single_id,
                        'purchase_product_ref_no'        => $product_codes[$key],
                        'purchase_product_name'          => $product_names[$key],
                        'purchase_product_barcode'       => $product_barcodes[$key],
                        'warehouse_id'                   => $product[$key]->warehouse_id,
                        'purchase_piece_per_packet'      => $pieces_per_packet[$key],
                        'purchase_packet_per_carton'     => $packets_per_carton[$key],
                        'purchase_piece_per_carton'      => $pieces_per_carton[$key],
                        'purchase_pieces_number'         => $products_pieces[$key],
                        'purchase_packets_number'        => $products_packets[$key],
                        'purchase_cartons_number'        => $products_cartons[$key],
                        'purchase_pieces_total'          => $products_quantity_pieces[$key],
                        'purchase_packets_total'         => $products_quantity_packets[$key],
                        'purchase_cartons_total'         => $products_quantity_cartons[$key],
                        'purchase_quantity_total'        => $products_quantity_total[$key],
                        'purchase_trade_discount'        => $products_discounts[$key],
                        'purchase_trade_price_piece'     => $products_unit_prices[$key],
                        'purchase_trade_price_packet'    => $products_unit_prices[$key]*$pieces_per_packet[$key],
                        'purchase_trade_price_carton'    => $products_unit_prices[$key]*$pieces_per_carton[$key],
                        'purchase_product_sub_total'     => $products_sub_totals[$key]
                    );

                    $purchase_edits['purchase_amount_dues'] = $purchase_edits['purchase_amount_dues'] + $products_sub_totals[$key];
                    $supplier_edits['supplier_balance_dues'] = $supplier_edits['supplier_balance_dues'] + $products_sub_totals[$key];

                    $purchase_product_save[$key] = DB::table('purchase_products')->insert($purchase_product_adds[$key]);

                }
                else{

                    $purchase_product_edits[$key] = array(
                        'purchase_product_name'          => $product_names[$key],
                        'purchase_piece_per_packet'      => $pieces_per_packet[$key],
                        'purchase_packet_per_carton'     => $packets_per_carton[$key],
                        'purchase_piece_per_carton'      => $pieces_per_carton[$key],
                        'purchase_pieces_number'         => $products_pieces[$key],
                        'purchase_packets_number'        => $products_packets[$key],
                        'purchase_cartons_number'        => $products_cartons[$key],
                        'purchase_pieces_total'          => $products_quantity_pieces[$key],
                        'purchase_packets_total'         => $products_quantity_packets[$key],
                        'purchase_cartons_total'         => $products_quantity_cartons[$key],
                        'purchase_quantity_total'        => $products_quantity_total[$key],
                        'purchase_trade_discount'        => $products_discounts[$key],
                        'purchase_trade_price_piece'     => $products_unit_prices[$key],
                        'purchase_trade_price_packet'    => $products_unit_prices[$key]*$pieces_per_packet[$key],
                        'purchase_trade_price_carton'    => $products_unit_prices[$key]*$pieces_per_carton[$key],
                        'purchase_product_sub_total'     => $products_sub_totals[$key]
                    );

                    $difference = $products_sub_totals[$key]-$purchase_products_get[$key]->purchase_product_sub_total;
                    $purchase_edits['purchase_amount_dues'] = $purchase_edits['purchase_amount_dues'] + $difference;
                    $supplier_edits['supplier_balance_dues'] = $supplier_edits['supplier_balance_dues'] + $difference;

                    $purchase_products_update = DB::table('purchase_products')->where('purchase_id', $purchase_id)->where('product_id','=', $single_id)->update($purchase_product_edits[$key]);

                }

            }

            foreach($product_ids as $key => $single_id){

                $products_quantity_pieces[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));
                $products_quantity_packets[$key] = ($products_pieces[$key]/$pieces_per_packet[$key])+$products_packets[$key]+($products_cartons[$key]*($packets_per_carton[$key]));
                $products_quantity_cartons[$key] = ($products_pieces[$key]/$pieces_per_carton[$key])+($products_packets[$key]/$packets_per_carton[$key])+$products_cartons[$key];
                $products_quantity_total[$key] = $products_pieces[$key]+($products_packets[$key]*($pieces_per_packet[$key]))+($products_cartons[$key]*($pieces_per_carton[$key]));

                $product[$key] = DB::table('products')->where('product_id','=', $single_id)->first();

                $purchase_products_get[$key] = DB::table('purchase_products')->where('purchase_id', $purchase_id)->where('product_id','=', $single_id)->first();

                if($purchase_products_get[$key] !== NULL){

                        $sum_purchase_pieces_total =  $purchase_products_get[$key]->purchase_pieces_total+$products_quantity_pieces[$key];
                        $sum_purchase_pieces_available = $purchase_products_get[$key]->purchase_pieces_total+$products_quantity_pieces[$key];
                        $sum_purchase_packets_total = $purchase_products_get[$key]->purchase_packets_total+$products_quantity_packets[$key];
                        $sum_purchase_packets_available   = $purchase_products_get[$key]->purchase_packets_total+$products_quantity_packets[$key];
                        $sum_purchase_cartons_total       = $purchase_products_get[$key]->purchase_cartons_total+$products_quantity_cartons[$key];
                        $sum_purchase_cartons_available   = $purchase_products_get[$key]->purchase_cartons_total+$products_quantity_cartons[$key];
                        $sum_purchase_quantity_total      = $purchase_products_get[$key]->purchase_quantity_total+$products_quantity_total[$key];
                        $sum_purchase_quantity_available  = $purchase_products_get[$key]->purchase_quantity_total+$products_quantity_total[$key];
                }
                else{
                    $sum_purchase_pieces_total = 0;
                    $sum_purchase_pieces_available = 0;
                    $sum_purchase_packets_total = 0;
                    $sum_purchase_packets_available = 0;
                    $sum_purchase_cartons_total = 0;
                    $sum_purchase_cartons_available = 0;
                    $sum_purchase_quantity_total = 0;
                    $sum_purchase_quantity_available = 0;
                }

                $product_edits = array(
                    // 'product_ref_no'                => $product_codes[$key],
                    // 'product_name'                  => $product_names[$key],
                    // 'product_barcode'               => $product_barcodes[$key],
                    // 'warehouse_id'                  => $product_warehouses[$key],
                    'product_piece_per_packet'      => $pieces_per_packet[$key],
                    'product_piece_per_carton'      => $pieces_per_carton[$key],
                    'product_pieces_total'          => $product[$key]->product_pieces_total+$sum_purchase_pieces_total,
                    'product_pieces_available'      => $product[$key]->product_pieces_available+$sum_purchase_pieces_available,
                    'product_packets_total'         => $product[$key]->product_packets_total+$sum_purchase_packets_total,
                    'product_packets_available'     => $product[$key]->product_packets_available+$sum_purchase_packets_available,
                    'product_cartons_total'         => $product[$key]->product_cartons_total+$sum_purchase_cartons_total,
                    'product_cartons_available'     => $product[$key]->product_cartons_available+$sum_purchase_cartons_available,
                    'product_quantity_total'        => $product[$key]->product_quantity_total+$sum_purchase_quantity_total,
                    'product_quantity_available'    => $product[$key]->product_quantity_available+$sum_purchase_quantity_available,
                    // 'product_trade_discount'        => $products_discounts[$key],
                    // 'product_trade_price_piece'     => $products_unit_prices[$key],
                    // 'product_trade_price_packet'    => $products_unit_prices[$key]*$pieces_per_packet[$key],
                    // 'product_trade_price_carton'    => $products_unit_prices[$key]*$pieces_per_carton[$key],
                );

                $update = DB::table('products')->where('product_id','=', $single_id)->update($product_edits);
            }

            $update1 = DB::table('suppliers')->where('supplier_id','=', $supplier_id)->update($supplier_edits);
            $update2 = DB::table('purchases')->where('purchase_id','=', $purchase_id)->update($purchase_edits);

            $purchase_data = Purchase::where('purchase_id', $purchase_id)->first();
            $purchase_products_data = PurchaseProducts::where('purchase_id', $purchase_id)->get();
            $user_data = User::where('id', $purchase_data->purchase_created_by)->first();
            $warehouse_data = Warehouse::where('warehouse_id', $purchase_data->warehouse_id)->first();
            $supplier_data = Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->first();
            $payment_data = Payment::where('purchase_id', $purchase_id)->get();
            $supplier_data->previous = $previous_balance;
            $purchase_data->purchase_amount_received = $purchase_amount_received;

            return view('purchases.invoiceupdate', compact('purchase_data', 'purchase_products_data', 'user_data', 'warehouse_data', 'supplier_data', 'payment_data',));

            // Session::flash('message' , 'Purchase Edited Successfully');
            // return redirect('/purchase');
            // return redirect('/purchase')->with(['message' => 'Purchase Edited Successfully'], 200);
            // if($update2){
            // 	return response()->json(['data' => $purchase_edits, /*'purchase_products' => $purchase_products_update,*/ 'message' => 'Purchase Edited Successfully'], 200);
            // }else{
            // 	return response()->json("Oops! Something Went Wrong", 400);
            // }
            // return redirect('purchases/'.$purchase_id.'/edit');

        }
        else{
            // return response()->json("Add atleast one product", 400);
            Session::flash('error' , 'Add atleast one product');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = url()->previous();
        $purchase_data = Purchase::where('purchase_id', $id)->first();
        $purchase_products_data = PurchaseProducts::where('purchase_id', $id)->get();
        // dd($purchase_products_data);
        if(!empty($purchase_products_data)){
            foreach ($purchase_products_data as $product_purchase) {
                // if($product_purchase->purchase_payment_method == "cash")
                // if($product_purchase->purchase_payment_method == "credit")
                $product_data = Product::where('product_id', $product_purchase->product_id)->get();
                //adjust product quantity
                foreach ($product_data as $child_product) {
                    // $child_data = Product::find($child_id);
                    $child_data = Product::where('product_id', $child_product->product_id)->first();
                    $update_data = array(
                        'product_quantity_total'  =>  $child_data->product_quantity_total + $product_purchase->purchase_quantity_total,
                        'product_quantity_available'  =>  $child_data->product_quantity_available + $product_purchase->purchase_quantity_total,
                        'product_pieces_total'  =>  $child_data->product_pieces_total + $product_purchase->purchase_pieces_total,
                        'product_packets_total'  =>  $child_data->product_packets_total + $product_purchase->purchase_packets_total,
                        'product_cartons_total'  =>  $child_data->product_cartons_total + $product_purchase->purchase_cartons_total,
                        'product_pieces_available'  =>  $child_data->product_pieces_available + $product_purchase->purchase_pieces_total,
                        'product_packets_available'  =>  $child_data->product_packets_available + $product_purchase->purchase_packets_total,
                        'product_cartons_available'  =>  $child_data->product_cartons_available + $product_purchase->purchase_cartons_total,
                    );
                    Product::where('product_id', $child_product->product_id)->update($update_data);
                }
                PurchaseProducts::where('product_id', $product_purchase->product_id)->delete();
            }
        }
        $payment_data = Payment::where('purchase_id', $id)->get();
        if(!empty($payment_data)){
            foreach ($payment_data as $payment) {
                if($payment->payment_method == 'cheque'){
                    // $supplier = Supplier::where('purchase_supplier_id', $purchase_data->purchase_supplier_id)->get();
                    // $supplier_data = array(
                    //     'supplier_balance_paid' => $supplier->supplier_balance_paid - $payment->payment_amount_paid
                    // );
                    // Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->update($supplier_data);
                    $thispayment = Payment::where('payment_id', $payment->payment_id)->first();
                    Payment::where('payment_id', $thispayment->payment_id)->delete();
                }
                elseif($payment->payment_method == 'cash'){
                    $supplier = Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->first();
                    $supplier_data = array(
                        'supplier_balance_paid' => $supplier->supplier_balance_paid - $payment->payment_amount_paid
                    );
                    Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->update($supplier_data);
                    $thispayment = Payment::where('payment_id', $payment->payment_id)->first();
                    Payment::where('payment_id', $thispayment->payment_id)->delete();
                }
                elseif($payment->payment_method == 'credit'){
                    $supplier = Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->first();
                    $supplier_data = array(
                        'supplier_balance_dues' => $supplier->supplier_balance_dues - $payment->payment_amount_paid
                    );
                    Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->update($supplier_data);
                    $thispayment = Payment::where('payment_id', $payment->payment_id)->first();
                    Payment::where('payment_id', $thispayment->payment_id)->delete();
                }
                // $payment->delete();
            }
        }
        Purchase::where('purchase_id', $purchase_data->purchase_id)->delete();
        return Redirect::to('purchase')->with('Purchase deleted successfully');
    }

    public  function generateRandomString($length = 20){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
	}

    public function genInvoice($id)
    {
        $purchase_data = Purchase::where('purchase_id', $id)->first();
        $purchase_products_data = PurchaseProducts::where('purchase_id', $id)->orderBy('purchase_cartons_number', 'desc')->get();
        $user_data = User::where('id', $purchase_data->purchase_created_by)->first();
        $warehouse_data = Warehouse::where('warehouse_id', $purchase_data->warehouse_id)->first();
        $supplier_data = Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->first();
        $payment_data = Payment::where('purchase_id', $id)->get();

        return view('purchases.invoice', compact('purchase_data', 'purchase_products_data', 'user_data', 'warehouse_data', 'supplier_data', 'payment_data',));
    }

    public function genInvoice2($id)
    {
        $purchase_data = Purchase::where('purchase_id', $id)->first();
        $purchase_products_data = PurchaseProducts::where('purchase_id', $id)->orderBy('purchase_cartons_number', 'desc')->get();
        $user_data = User::where('id', $purchase_data->purchase_created_by)->first();
        $warehouse_data = Warehouse::where('warehouse_id', $purchase_data->warehouse_id)->first();
        $supplier_data = Supplier::where('supplier_id', $purchase_data->purchase_supplier_id)->first();
        $payment_data = Payment::where('purchase_id', $id)->get();

        return view('purchases.invoiceupdate', compact('purchase_data', 'purchase_products_data', 'user_data', 'warehouse_data', 'supplier_data', 'payment_data',));
    }
}
