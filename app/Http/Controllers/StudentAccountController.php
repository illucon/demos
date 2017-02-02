<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Student;
use App\ClassName;
use App\SectionName;
use App\AccountItem;
use App\AccountHead;
use App\AccountType;
use App\Invoice;
use App\ReceivePayment;

class StudentAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function assign_invoice(){
        
        $all_class_name = ClassName::all();
        
        $all_account_head_with_income = AccountHead::where('account_types_id',1)->get();
        
//        echo '<pre>';
//        print_r($all_account_head_with_income);exit();
        
        $loop = count($all_account_head_with_income);
        
        for($i=0; $i<$loop; $i++){
            $account_head_id = $all_account_head_with_income[$i]->id;
            $student_account_items[$i] = AccountItem::where('account_heads_id',$account_head_id)->get();
        }
        
        $object = (object) $student_account_items;
        
//        echo "<pre>";
//        print_r($object);
//        exit();
        
        return view('admin.pages.account_management.student_account.assign_invoice')
                          ->with('all_class_name',$all_class_name)
                          ->with('object', $object);
    }
    
    public function ajax_selected_class_students(Request $request){
        
        if ($request->ajax()) {
            $class_id = $request->data;
            
            $selected_class_students = Student::where('class_names_id',$class_id)->get();
            
            view()->share('info_students',$selected_class_students); //info_students unique
            $view = view('admin.pages.ajax_options.student_lists');
            $render = $view->render();
            $result['response'] = $render;
            
            return response()->json($result);
        }
    }

    public function generate_invoice_for_students(Request $request){
        
        $account_item_id = $request->select_account_item;
        $account_item_info = AccountItem::find($account_item_id);
        
        $account_item_price = $account_item_info->account_item_price;
        
        $count = count($request->checked_student);
        
        for($i=0; $i<$count; $i++){
            $invoice = new Invoice;
            $invoice->account_items_id = $account_item_id;
            $invoice->students_id = $request->checked_student[$i];
            $invoice->receivable_amount = $account_item_price;
            
            $invoice->save();
        }
        
        return back()->with('success','Invoice Successfully Created for Students');
    }
    
    public function all_invoices(){
        
        $invoices = Invoice::all();
        
        return view('admin.pages.account_management.student_account.all_invoices')
                          ->with('invoices',$invoices);
    }
    public function student_account_profile( $student_id ){
        
        $student_info = Student::find($student_id);
        
        $invoices = Invoice::where('students_id',$student_id)->get();
        
        return view('admin.pages.account_management.student_account.account_profile')
                          ->with('student_info',$student_info)
                          ->with('invoices',$invoices);
    }
    
    public function student_receive_payments($invoice_id){
       
       $invoice_info = Invoice::find($invoice_id);
       
       $student_id =  $invoice_info->students_id;
       
       $student_info = Student::find($student_id);
       
              
       return view('admin.pages.account_management.student_account.receive_student_payments')
                         ->with('invoice_info',$invoice_info)
                         ->with('student_info',$student_info);
   }
   
   public function save_student_payments(Request $request){
       
       $invoice_item_id = $request->invoice_item_id;
       
       $receive_payments_check = ReceivePayment::where('invoices_id',$invoice_item_id)->first();
       
       if (!$receive_payments_check) {
            $receive_payments = new ReceivePayment;

            $receive_payments->invoices_id = $invoice_item_id;
            $receive_payments->paid_amount = $request->paid_amount;
            $receive_payments->note = $request->note;

            $receive_payments->save();
        }else{
            
            $receive_payments_info = ReceivePayment::where('invoices_id',$invoice_item_id)->first();
            $previously_paid_amount = $receive_payments_info->paid_amount;
            $receive_payments_info->paid_amount = $previously_paid_amount + ($request->paid_amount);
            $receive_payments_info->note = $request ->note;
            
            $receive_payments_info->save();
        }

       $invoice_item_info = Invoice::find($invoice_item_id);
       
       $previously_paid_taka = $invoice_item_info->paid_amount;
       $invoice_item_info->paid_amount = $previously_paid_taka + ($request->paid_amount);
       $invoice_item_info->status = $request->invoice_item_status;
       
       $invoice_item_info->save();
       
       return Redirect::to('all-invoices')->with('success','Successfully Received Money From Student');
   }
   
   public function receive_payments(){
       
       $all_classes = ClassName::all();
       
       return view('admin.pages.account_management.student_account.receive_payments')
                          ->with('all_classes',$all_classes);
   }
   
   public function ajax_section_view(Request $request){
       
       if ($request->ajax()) {
            $class_id = $request->data;
            
            $class_defined_section = SectionName::where('class_names_id',$class_id)->get();
            
            view()->share('class_to_section',$class_defined_section); //info_students unique
            $view = view('admin.pages.ajax_options.section');
            $render = $view->render();
            $result['response'] = $render;
            
            return response()->json($result);
        }
       
   }
   public function ajax_student_view(Request $request){
       
       if ($request->ajax()) {
            $section_id = $request->data;
            
            $section_students = Student::where('section',$section_id)->get();
            
            view()->share('section_wise_students',$section_students);
            $view = view('admin.pages.ajax_options.selection_student');
            $render = $view->render();
            $result['response'] = $render;
            
            return response()->json($result);
        }
       
   }
   public function ajax_student_id_find(Request $request){
       
       if ($request->ajax()) {
            $student_id = $request->data;
            
            $student_info = Student::find($student_id);
            
            view()->share('student_information',$student_info);
            $view = view('admin.pages.ajax_options.student_id_input');
            $render = $view->render();
            $result['response'] = $render;
            
            return response()->json($result);
        }
       
   }
   public function ajax_student_invoices_info(Request $request){
       
       if ($request->ajax()) {
            $student_sid = $request->data;            
            $student_info = Student::where('sid',$student_sid)->first();            
            $student_id = $student_info->id;
            
            $invoices = Invoice::where('students_id',$student_id)->get();
            
            view()->share('invoices_info',$invoices);
            $view = view('admin.pages.ajax_options.invoices');
            $render = $view->render();
            $result['response'] = $render;
            
            return response()->json($result);
        }
       
   }

   public function all_received_payments(){
       
       $all_received_payments = ReceivePayment::all();
       
       return view('admin.pages.account_management.student_account.all_received_payments')
                          ->with('all_received_payments',$all_received_payments);
   }


   


        public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
