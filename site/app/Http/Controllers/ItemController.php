<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\ItemVariable;
use App\Variable;
class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            // 'disc'=>'required',
            'cat'=>'required',
        ]);
        $item=new Item();
        $item->title=$request->title;
        $item->description=$request->disc;
        $item->cat_id=$request->cat;
       $item->custome_type=$request->custome;
       $item->free_toppings=$request->free_toppings;
       $item->free_sauces=$request->free_sauces;
       $item->free_pops=$request->free_pops;
       $item->free_ranch=$request->free_ranch;
        if($request->file('image')) {
            $upload = $request->file('image');
            $fileformat = time() . '.' . $upload->getClientOriginalName();
            if ($upload->move('uploads/menus/', $fileformat)) {
                $item->image = $fileformat;
            }
           
        }
        if($item->save()){
            foreach(Variable::where('type','size')->get() as $row){
                $var=new ItemVariable();
                $var->item_id=$item->id;
                $var->variable_id=$row->id;
                $var->value=$row->value;
                $var->price=$request[$row->value];
                $var->save();
            }
            return redirect()->route('menus.index');

           
        }else{
            return redirect()->back()->with('unsuccess','Failed try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Item::where('id',$id)->first();
        return view('admin.menus.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            // 'disc'=>'required',
            'cat'=>'required',
        ]);
        $item=Item::where('id',$id)->first();
        $item->title=$request->title;
        $item->description=$request->disc;
        $item->cat_id=$request->cat;
        $item->custome_type=$request->custome;
        $item->free_toppings=$request->free_toppings;
       $item->free_sauces=$request->free_sauces;
       $item->free_pops=$request->free_pops;
       $item->free_ranch=$request->free_ranch;
        if($request->file('image')) {
            $upload = $request->file('image');
            $fileformat = time() . '.' . $upload->getClientOriginalName();
            if ($upload->move('uploads/menus/', $fileformat)) {
                $item->image = $fileformat;
            }
           
        }
        if($item->update()){
            foreach(ItemVariable::where('item_id',$item->id)->get() as $var){
               
                $var->value=$var->value;
                $var->price=$request[$var->value];
                $var->update();
            }
            return redirect()->route('menus.index');

           
        }else{
            return redirect()->back()->with('unsuccess','Failed try again.');
        }

    }

    public function changeStatus($id){
        $item=Item::where('id',$id)->first();
        if($item->active==1){
            $item->active=0;
        }else{
            $item->active=1;
        }
        if($item->update()){
            return redirect()->route('menus.index');
        }else{
            return redirect()->back()->with('unsuccess','Failed try again.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
    }
}
