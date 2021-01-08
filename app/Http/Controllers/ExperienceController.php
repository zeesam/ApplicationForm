<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Finalsubmitted;
use Auth;
class ExperienceController extends Controller
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
        $data = Experience::where('userid','=',Auth::user()->id)->get();
        return view('/experience/index',['data'=>$data]);
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
        $add = (new Experience)->AddExperience($data);
        return redirect('/experience/index')->with('message','Experience Details Added!');
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
        $add = (new Experience)->UpdateExperience($data,$id);
        return redirect('/experience/index')->with('message','Experience Details Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Experience::find($id);
        if($data->userid == Auth::user()->id)
        {
          $data->delete();
          return redirect('/experience/index')->with('message','Experience Details Deleted!');
        }
        else {
          return redirect('/experience/index')->with('message','Invalid Page Entry!');
        }
    }
    public function FormValidate($request)
    {
      return $this->validate($request,[
      'userid' => 'required',
      'emporg' => 'required',
      'doj' => 'required',
      'dol' => 'required',
      'exp' => 'required',
      'desig' => 'required'
    ]);
    }
}
