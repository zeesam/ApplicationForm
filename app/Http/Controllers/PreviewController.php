<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Academic;
use App\Models\Experience;
use App\Models\Document;
use App\Models\Payment;
use App\Models\Finalsubmitted;
class PreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = Personal::where('userid','=',Auth::user()->id)->first();
        $academic = Academic::where('userid','=',Auth::user()->id)->first();
        $experience = Experience::where('userid','=',Auth::user()->id)->first();
        $docs = Document::where('userid','=',Auth::user()->id)->first();
        $payment = Payment::where('userid','=',Auth::user()->id)->first();
        $final = Finalsubmitted::where('userid','=',Auth::user()->id)->first();
        if(empty($personal))
        {
          return redirect('/personal/index')->with('message','Incomplete Profile Details!');
        }
        elseif(empty($academic)) {
          return redirect('/academic/index')->with('message','Incomplete Academic Details!');
        }
        elseif(empty($experience)) {
          return redirect('/experience/index')->with('message','Incomplete Experience Details!');
        }
        elseif(empty($docs)) {
          return redirect('/document/index')->with('message','Upload Photo and Signature!');
        }
        elseif(!empty($final)) {
          return redirect('/home')->with('message','You have already submitted your application!');
        }
        else
        {
          return view('/preview/index',['personal'=>$personal,'academic'=>$academic,'experience'=>$experience,'docs'=>$docs,'payment'=>$payment]);
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
