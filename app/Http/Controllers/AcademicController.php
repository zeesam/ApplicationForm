<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academic;
use App\Models\Finalsubmitted;
use Auth;
class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $final = Finalsubmitted::where('userid',Auth::user()->id)->first();
        if(!empty($final))
        {
          return redirect('/home')->with('message','You have already submitted your Application!');
        }
        else {
          $data = Academic::where('userid','=',Auth::user()->id)->get();
          return view('/academic/index',['data'=>$data]);
        }

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
        $data = $this->FormValidate($request);
        $add = (new Academic)->AddAcademic($data);
        return redirect('/academic/index')->with('message','Academic Details Added!');
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
        $data = $this->FormValidate($request);
        $update = (new Academic)->UpdateAcademic($data,$id);
        return redirect('/academic/index')->with('message','Academic Details Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Academic::find($id);
        if($data->userid == Auth::user()->id)
        {
          $data->delete();
          return redirect('/academic/index')->with('message','Academic Details Deleted!');
        }
        else {
          return redirect('/academic/index')->with('message','Invalid Page Entry!');
        }
    }
    public function FormValidate($request)
    {
        return $this->validate($request,[
          'userid' => 'required',
          'exam' => 'required',
          'board' => 'required',
          'yearofpassing' => 'required',
          'pcogpa' => 'required|max:10',
          'division' => 'required|max:30'
        ]);
    }
}
