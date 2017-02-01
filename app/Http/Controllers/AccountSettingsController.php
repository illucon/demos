<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AccountType;
use App\AccountHead;
use App\AccountItem;

class AccountSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //defining account types page view
    public function account_types(){
        
        $account_types = AccountType::all();
        
        return view('admin.pages.account_management.account_settings.account_types',compact('account_types'));
    }

    public function save_account_types(Request $request){
        
        $account_type = new AccountType;
        
        $account_type->account_type_name = $request->account_types_name;
        $account_type->save();
        
        return back()->with('success','Successfully added Account Types');        
    }
    
    //defining account head page view
    public function account_heads(){
        
        $account_heads = AccountHead::all();
        $account_types = AccountType::all();
        
        return view('admin.pages.account_management.account_settings.account_heads',compact('account_heads'))
                    ->with('account_types',$account_types);
    }
    public function save_account_heads(Request $request){
        
        $account_head = new AccountHead;
        
        $account_head->head_name = $request->head_name;
        $account_head->account_types_id = $request->head_category;
        $account_head->save();
        
        return back()->with('success','Successfully added Account Heads');        
    }
    
    //defining account items page view
    public function account_items(){
        
        $account_heads = AccountHead::all();
        $account_types = AccountType::all();
        $account_items = AccountItem::all();
        
        return view('admin.pages.account_management.account_settings.account_items',compact('account_heads'))
                    ->with('account_types',$account_types)
                    ->with('account_items',$account_items);
    }
    
    public function account_head_selection(Request $request){
        
        if ($request->ajax()) {
            $account_type = $request->data;
            $all_account_head_info = AccountHead::where('account_types_id',$account_type)->get();
            
            view()->share('info',$all_account_head_info);
            $view = view('admin.pages.ajax_options.account_head');
            $render = $view->render();
            $result['response'] = $render;
            
            return response()->json($result);
        }
        
    }
    
    public function save_new_account_item(Request $request){
        
        $account_item = new AccountItem;
        
        $account_item->account_item_name = $request->account_item_name;
        $account_item->account_heads_id = $request->head_item_id;
        
        $account_item->save();
        
        return back()->with('success','Successfully Added Account Item');
    }
    
    public function account_item_price(){
        
        $account_heads = AccountHead::all();
        $account_types = AccountType::all();
        $account_items = AccountItem::all();
        
        return view('admin.pages.account_management.account_settings.account_items_price')
                          ->with('account_types',$account_types)
                          ->with('account_items',$account_items);
    }


    public function save_account_item_price(Request $request){
        
        $account_item = new AccountItem;
        
        $account_item->account_item_name = $request->account_item_name;
        $account_item->account_heads_id = $request->head_item_id;
        
        $account_item->save();
        
        return back()->with('success','Successfully Added Account Item');
    }

    
    public function ajax_account_head_view(Request $request){
        
        if ($request->ajax()) {
            $account_head = $request->data;
            $all_account_head_info = AccountItem::where('account_heads_id',$account_head)->get();
            
            view()->share('info_2',$all_account_head_info);
            $view = view('admin.pages.ajax_options.account_items');
            $render = $view->render();
            $result['response'] = $render;
            
            return response()->json($result);
        }
        
    }
    public function save_account_item_amount(Request $request){
        
        $account_item_id = $request->account_item;
        
        $account_item_info = AccountItem::find($account_item_id);
        
        $account_item_info->account_item_price = $request->amount;
        $account_item_info->save();
        
        return back()->with('success','Successfully Updated Account Price');        
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
