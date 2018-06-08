<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article as article;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //protected $CRUD=App\Article::find($id);;

    // public function __construct(CRUDRepository $CRUDRepo) {
    //     $this->CRUDRepo = $CRUDRepo;
    // }

    public function index()
    {
        //
        $all_data = article::paginate(10);
        //return view('index');
        //$articles = App\Article::all();
        return view("index",['users' => $all_data]);
        // dd($all_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $test = new article();
        $time=$test->setPublishedAtAttribute();
        $all=$request->all();
        $all['created_at'] = $time;
        $post = article::create($request->all());
        if ($post) {
            return response()->json(array(
             'status' => 1,
             'msg' => 'success',
            ));
        } else {

             return Redirect::back()->withInput()->withErrors('保存失败！');

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
        $passport = article::find($id)->toArray();
        
        return view("read",['data' => $passport]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = article::find($request->id);
        $data->name=$request->name;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->category_id=$request->category_id;
        $data->remember_token=$request->_token;
        $data->save();
        if ($data) {
            return response()->json(array(
             'status' => 1,
             'msg' => 'success',
            ));
        } else {

             return Redirect::back()->withInput()->withErrors('保存失败！');

        }
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
    public function destroy(Request $request)
    {
        $data =article::find($request->id)->delete();
        if ($data) {
            return response()->json(array(
             'status' => 1,
             'msg' => 'success',
            ));
        } else {
             return Redirect::back()->withInput()->withErrors('保存失败！');

        }
    }
}
