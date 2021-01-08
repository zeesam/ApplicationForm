<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Finalsubmitted;
use Auth;
class PersonalController extends Controller
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
        $data = Personal::where('userid', '=', Auth::user()->id)->first();
        return view('personal/index',['data'=>$data]);
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
        $adder = (new Personal)->AddPersonal($data);
        return redirect('/personal/index')->with('message','Profile Created Successfully!');
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
        $data = Personal::find($id);
        if($data->userid != Auth::user()->id)
        {
          return redirect('/personal/index')->with('message','Invalid Page Entry!');
        }
        else {
          return view('/personal/edit',['data'=>$data]);
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
        $data = $this->FormValidate($request,$id);
        $update = (new Personal)->UpdatePersonal($data,$id);
        return redirect('/personal/index')->with('message','Profile Updated Successfully!');
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
    public function FormValidate($request)
    {
      return $this->validate($request,[
        'userid' => 'required',
        'name' => 'required',
        'fname' => 'required',
        'email' => 'required',
        'mobile' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        'addressa' => 'required',
        'addressb' => 'required',
        'landmark' => 'required',
        'state' => 'required',
        'district' => 'required',
        'pincode' => 'required'
      ]);
    }
}
