<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
use Input;
use Session;
use Response;
use Validator;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function __construct(Customer $customer /*, User $user*/)
    {
        $this->Customer = $customer;
        // $this->myuser = new UserController($user);
        // $this->User = $user;
    }

    /**
     * Display a listing of the customers
     *
     * @param  \App\Customer  $model
     * @return \Illuminate\View\View
     */
    public function index(Customer $model)
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers') );
        // return view('customers.index', ['customers' => $model->paginate(15)->items()]);
    }
    public function getCustomersData()
    {
        $customers = Customer::all();

        return Datatables::of($customers)
        ->addColumn('action', function ($customers) {
            return '<a type="button" href="customer/'. $customers->customer_id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
        })
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $model)
    {
        $customers = Customer::all();
        return view('customers.add', compact('customers') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth::user()->id);
        $validate = Validator::make($request->all(), [ 
            'customer_ref_no' 			=> 'required',
            'customer_type'             => 'required',//General, Distributer, Reseller
            'customer_name' 			=> ['required','unique:customers,customer_name'],
            'customer_shop_name' 		=> '',
            'customer_shop_info' 		=> '',
            'customer_email' 			=> '',
            'customer_alternate_email' 	=> '',
            'customer_cnic_number' 		=> '',
            'customer_town' 			=> '',
            'customer_area' 			=> '',
            'customer_shop_address' 	=> '',
            'customer_resident_address' => '',
            'customer_zipcode' 			=> '',
            'customer_phone_number' 	=> '',
            'customer_office_number' 	=> '',
            'customer_alternate_number' => '',
            'customer_total_balance' 	=> '',
            'customer_balance_paid' 	=> 'required',
            'customer_balance_dues' 	=> 'required',
            'customer_credit_duration' 	=> '',
            'customer_credit_type' 	    => '',
            'customer_credit_limit' 	=> '',
            'customer_sale_rate' 	    => 'required',
            'status_id' 	            => 'required',
        ]);
        if ($validate->fails()) {    
        //    return response()->json("Fields Required", 400);
           return redirect()->back()->withErrors($validate);
        }
        $customer_adds = array(
            'customer_ref_no' 			=> $request->customer_ref_no,
            'customer_type'             => $request->customer_type,
            'customer_name' 			=> $request->customer_name,
            'customer_shop_name' 		=> $request->customer_shop_name,
            'customer_shop_info' 		=> $request->customer_shop_info,
            'customer_email' 			=> $request->customer_email,
            'customer_alternate_email' 	=> $request->customer_alternate_email,
            'customer_cnic_number' 		=> $request->customer_cnic_number,
            'customer_town' 			=> $request->customer_town,
            'customer_area' 			=> $request->customer_area,
            'customer_shop_address' 	=> $request->customer_shop_address,
            'customer_resident_address' => $request->customer_resident_address,
            'customer_zipcode' 			=> $request->customer_zipcode,
            'customer_phone_number' 	=> $request->customer_phone_number,
            'customer_office_number' 	=> $request->customer_office_number,
            'customer_alternate_number' => $request->customer_alternate_number,
            'customer_total_balance' 	=> $request->customer_total_balance,
            'customer_balance_paid' 	=> $request->customer_balance_paid,
            'customer_balance_dues' 	=> $request->customer_balance_dues,
            'customer_credit_duration' 	=> $request->customer_credit_duration,
            'customer_credit_type' 	    => $request->customer_credit_type,
            'customer_credit_limit' 	=> $request->customer_credit_limit,
            'customer_sale_rate' 	    => $request->customer_sale_rate,
            'status_id' 	            => $request->status_id,
            'customer_created_by' 	    => Auth::user()->id,
            // 'created_at'	 			=> date('Y-m-d h:i:s'),
        );
        $save = DB::table('customers')->insert($customer_adds);
        $id = DB::getPdo()->lastInsertId();
        // $add_id = DB::table('customers')->insertGetId($customer_adds);
		Session::flash('message' , 'Customer Added Successfully');
        return redirect('customer');
        // return redirect()->back();
        // if($save){
		// 	return response()->json(['data' => $customer_adds, 'message' => 'Customer Created Successfully'], 200);
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
    public function edit(Customer $model, $id)
    {
        $customer = Customer::where('customer_id', $id)->get();

        return view('customers.edit', compact('customer') );
        // return view('customers.edit', ['customer' => $model->paginate(15)->items()[$id-1]]);
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
        $customer_id = $id; //OR $request->customers_id;

        $validate = Validator::make($request->all(), [ 
            'customer_ref_no' 			=> 'required',
            'customer_type'             => 'required',//General, Distributer, Reseller
            'customer_name' 			=> ['required', Rule::unique('customers', 'customer_name')->ignore($id, 'customer_id'),],
            'customer_shop_name' 		=> '',
            'customer_shop_info' 		=> '',
            'customer_email' 			=> '',
            'customer_alternate_email' 	=> '',
            'customer_cnic_number' 		=> '',
            'customer_town' 			=> '',
            'customer_area' 			=> '',
            'customer_shop_address' 	=> '',
            'customer_resident_address' => '',
            'customer_zipcode' 			=> '',
            'customer_phone_number' 	=> '',
            'customer_office_number' 	=> '',
            'customer_alternate_number' => '',
            'customer_total_balance' 	=> '',
            'customer_balance_paid' 	=> 'required',
            'customer_balance_dues' 	=> 'required',
            'customer_credit_duration' 	=> '',
            'customer_credit_type' 	    => '',
            'customer_credit_limit' 	=> '',
            'customer_sale_rate' 	    => 'required',
            'status_id' 	            => 'required',
        ]);
        if ($validate->fails()) {    
        //    return response()->json("Fields Required", 400);
           return redirect()->back()->withErrors($validate);
        }
        $customer_edits = array(
            'customer_ref_no' 			=> $request->customer_ref_no,
            'customer_type'             => $request->customer_type,
            'customer_name' 			=> $request->customer_name,
            'customer_shop_name' 		=> $request->customer_shop_name,
            'customer_shop_info' 		=> $request->customer_shop_info,
            'customer_email' 			=> $request->customer_email,
            'customer_alternate_email' 	=> $request->customer_alternate_email,
            'customer_cnic_number' 		=> $request->customer_cnic_number,
            'customer_town' 			=> $request->customer_town,
            'customer_area' 			=> $request->customer_area,
            'customer_shop_address' 	=> $request->customer_shop_address,
            'customer_resident_address' => $request->customer_resident_address,
            'customer_zipcode' 			=> $request->customer_zipcode,
            'customer_phone_number' 	=> $request->customer_phone_number,
            'customer_office_number' 	=> $request->customer_office_number,
            'customer_alternate_number' => $request->customer_alternate_number,
            'customer_total_balance' 	=> $request->customer_total_balance,
            'customer_balance_paid' 	=> $request->customer_balance_paid,
            'customer_balance_dues' 	=> $request->customer_balance_dues,
            'customer_credit_duration' 	=> $request->customer_credit_duration,
            'customer_credit_type' 	    => $request->customer_credit_type,
            'customer_credit_limit' 	=> $request->customer_credit_limit,
            'customer_sale_rate' 	    => $request->customer_sale_rate,
            'status_id' 	            => $request->status_id,
            // 'updated_by' 	        => Auth::user()->id,
            // 'created_at'	 			=> date('Y-m-d h:i:s'),
        );

        // $this->Customer->updateCustomer($customer_id, $customer_edits);
        $update = DB::table('customers')->where('customer_id','=', $customer_id)->update($customer_edits);
        // return redirect()->back();
        Session::flash('message' , 'Customer Edited Successfully');
        return redirect('/customer');
        // ->with(['message' => 'Customer Edited Successfully'], 200);
        // return redirect('customers/'.$customer_id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('customers')->where('customer_id', $id)->delete();

        return redirect('/customer')->with(['message' => 'Customer Deleted Successfully'], 200);

    }

    public function searchcustomer(Request $request)
    {

        $getRecords = NULL;
        // $input = trim(filter_var($request['search_data'], FILTER_SANITIZE_STRING));
        $input = trim(filter_var($request['data'], FILTER_SANITIZE_STRING));
        //return response()->json(['input' => $request['input'],], 200);
        $records = Customer::where(function($query)use($input){
            // $query->orWhere('customer_ref_no', 'LIKE', "%{$input}%");
            $query->orWhere('customer_name', '=', $input);
        })
        ->get()->toArray();
        
        // send the response
        //return Response::json([
        // return response()->json([
        //     'records' => $records->count() > 0
        //         ? $records//$getRecords
        //         : [],/*'Nothing to show.',*/
        // ], 200);

        return $records;
    }

    public function searchcustomerpayments(Request $request)
    {
        $getRecords = NULL;
        $myvar = NULL;
        // $input = trim(filter_var($request['search_data'], FILTER_SANITIZE_STRING));
        $input = trim(filter_var($request['data'], FILTER_SANITIZE_STRING));
        //return response()->json(['input' => $request['input'],], 200);
        $records = Customer::where(function($query)use($input){
            // $query->orWhere('customer_ref_no', 'LIKE', "%{$input}%");
            $query->orWhere('customer_name', '=', $input);
        })
        ->get()->toArray();

        $customer_id = $records[0]['customer_id'];

        $records2 = Payment::where(function($query)use($customer_id){
            $query->where('payment_customer_id', '=', $customer_id);
        })
        ->get()->toArray();

        foreach($records2 as $one_payment){
            $myvar .= '<tr class="row table-info"><td class="col-1 firstcol text-center">'.$one_payment['payment_invoice_id'].'</td><td class="col-1 mycol text-center">'.$one_payment['payment_invoice_date'].'</td><td class="col-2 mycol text-center"   >'.$one_payment['payment_id'].'</td><td class="col-2 mycol text-center"   >'.$one_payment['payment_amount_paid'].'</td><td class="col-2 mycol text-center"   >'.$one_payment['payment_id'].'</td><td class="col-1 mycol text-center"   >'.$one_payment['payment_method'].'</td><td class="col-1 mycol text-center"   >'.$one_payment['payment_type'].'</td><td class="col-1 mycol text-center"   >'.$one_payment['payment_id'].'</td> <td class="col-1 lastcol text-center" >'.$one_payment['customer_amount_dues'].'</td></tr>';
        }

        $records3 = array(
            'customer' => $records,
            'payments' => $myvar
        );
        
        return $records3;
    }
}
