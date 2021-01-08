<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Finalsubmitted;
use Auth;
class DocumentController extends Controller
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
        $data = Document::where('userid',Auth::user()->id)->first();
        return view('/document/index',['data'=>$data]);
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
        $this->validate($request,[
          'photo' => 'required|mimes:jpeg,jpg,png|max:80|min:20',
          'sign' => 'required|mimes:jpeg,jpg,png|max:80|min:10'
        ]);
        $data = new Document;
        $data->userid = $request->input('userid');
        $photo = $request->file('photo');
        $sign = $request->file('sign');
        $dir_photo = '../public/uploads/photo';
        $dir_sign = '../public/uploads/sign';
        $ext_photo = $photo->getClientOriginalExtension();
        $photo_name = 'p_'.time().'.'.$ext_photo;
        $photo->move($dir_photo,$photo_name);
        $ext_sign = $sign->getClientOriginalExtension();
        $sign_name = 's_'.time().'.'.$ext_sign;
        $sign->move($dir_sign,$sign_name);
        $data->photo = $photo_name;
        $data->sign = $sign_name;
        $data->save();
        return redirect('/document/index')->with('message','Uploaded Successfully!');


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
        $data = Document::find($id);
        return view('/document/index',['data'=>$data]);
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
        $data = Document::find($id);
        $data->userid = $request->input('userid');
        $photo = $request->file('photo');
        $sign = $request->file('sign');
        if($photo)
        {
          $this->validate($request,[
            'photo' => 'required|mimes:jpeg,jpg,png|max:80|min:20'
          ]);
          $dir_photo = '../public/uploads/photo';
          unlink('../public/uploads/photo/'.$data->photo);
          $ext_photo = $photo->getClientOriginalExtension();
          $photo_name = 'p_'.time().'.'.$ext_photo;
          $photo->move($dir_photo,$photo_name);
          $data->photo = $photo_name;
        }
        if($sign)
        {
          $this->validate($request,[
            'sign' => 'required|mimes:jpeg,jpg,png|max:80|min:10'
          ]);
          $dir_sign = '../public/uploads/sign';
          unlink('../public/uploads/sign/'.$data->sign);
          $ext_sign = $sign->getClientOriginalExtension();
          $sign_name = 's_'.time().'.'.$ext_sign;
          $sign->move($dir_sign,$sign_name);
          $data->sign = $sign_name;
        }
        $data->update();
        return redirect('/document/index')->with('message','Updated Successfully!');
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
