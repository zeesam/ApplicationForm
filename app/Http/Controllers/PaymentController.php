<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Finalsubmitted;
use Auth;
class PaymentController extends Controller
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
        $data = Payment::where('userid', Auth::user()->id)->first();
        return view('/payment/index',['data'=>$data]);
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
        $add = (new Payment)->AddPayment($data);
        return redirect('/payment/index')->with('message','Payment Details Inserted!');
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
        $update = (new Payment)->UpdatePayment($data,$id);
        return redirect('/payment/index')->with('message','Payment Details Updated!');
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
      return $this->validate($request, [
        'userid' => 'required',
        'sbicol' => 'required|unique:payments,sbicol',
        'dop' => 'required'
      ]);
    }
}
