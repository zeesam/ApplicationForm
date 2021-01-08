@extends('layouts.dashnew')
@section('pagetitle', 'Preview, CAU, Imphal')
@section('title', 'Preview')
@section('preview', 'active')
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Preview Details</h5>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <h5 class="card-title">Uploads</h5>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Passport Photo</th>
                        <th scope="col">Signature</th>
                        <th scope="col">SBI Collect Reference Number</th>
                        <th scope="col">Date of Payment</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">
                          <img id="sign" src="../uploads/photo/{{$docs->photo}}" height="200px" width="160px"/><br>
                          {{$docs->photo}}</th>
                        <th>
                          <img id="sign" src="../uploads/sign/{{$docs->sign}}" height="60px" width="160px"/><br>
                          {{$docs->sign}}</th>
                          <th>
                            @if(isset($payment->sbicol)){{$payment->sbicol}}
                            @endif
                          </th>
                          <th>
                            @if(isset($payment->dop)){{$payment->dop}}
                            @endif
                          </th>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                  <h5 class="card-title">Personal Details</h5>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Father's Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{$personal->name}}</th>
                        <td>{{$personal->fname}}</td>
                        <td>{{$personal->email}}</td>
                        <td>{{$personal->mobile}}</td>
                      </tr>
                    </tbody>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Address 1</th>
                        <th scope="col">Address 2</th>
                        <th scope="col">Landmark</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{$personal->dob}}</th>
                        <td>{{$personal->addressa}}</td>
                        <td>{{$personal->addressb}}</td>
                        <td>{{$personal->landmark}}</td>
                      </tr>
                    </tbody>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">District</th>
                        <th scope="col">State</th>
                        <th scope="col">Area Pincode</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">{{$personal->district}}</td>
                        <td>{{$personal->state}}</td>
                        <td>{{$personal->pincode}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                  <h5 class="card-title">Academic Details</h5>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Exam</th>
                        <th scope="col">Board</th>
                        <th scope="col">Year of Passing</th>
                        <th scope="col">PC or OGPA</th>
                        <th scope="col">Division</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(App\Models\Academic::where('userid',Auth::user()->id)->get() as $key=>$acad)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <th>{{$acad->exam}}</th>
                        <td>{{$acad->board}}</td>
                        <td>{{$acad->yearofpassing}}</td>
                        <td>{{$acad->pcogpa}}</td>
                        <td>{{$acad->division}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <hr>
                  <h5 class="card-title">Experience Details</h5>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employer/Organization</th>
                        <th scope="col">Date of Joining</th>
                        <th scope="col">Date of Leaving</th>
                        <th scope="col">Total Experience</th>
                        <th scope="col">Designation/Position</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(App\Models\Experience::where('userid',Auth::user()->id)->get() as $key=>$exp)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <th>{{$exp->emporg}}</th>
                        <td>{{$exp->doj}}</td>
                        <td>{{$exp->dol}}</td>
                        <td>{{$exp->exp}}</td>
                        <td>{{$exp->desig}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table><br>
                  <p align="center">
                    <form method="post" action="{{url('final/store')}}">@csrf
                      <input type="hidden" name="userid" value="{{Auth::user()->id}}" />
                      <input type="checkbox" required /> I, hereby, declare that the information furnished above are true to the best of my knowledge and belief. I, also,
                        agree to abide by the rules and regulations governing the recruitment norms of CAU, Imphal<br>
                      <button type="submit" class="btn btn-warning">Final Submit</button>
                    </form>
                  </p>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Updated
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
