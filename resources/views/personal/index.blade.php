@extends('layouts.dashnew')
@section('pagetitle', 'Personal, CAU, Imphal')
@section('title', 'Personal')
@section('personal', 'active')
@section('content')
    <div class="content">
        <div class="row">
          @if(Session::has('message'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          <div class="col-md-12">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Personal Details</h5>
              </div>
              @if(empty($data->userid))
              <div class="card-body ">
                <form method="post" action="{{url('/personal/store')}}">@csrf
                  <input type="hidden" name="userid" value="{{Auth::user()->id}}" class="form-control">
                <div class="container">
                  <h5 class="card-title">Personal Profile</h5>
                  <div class="row">
                      <div class="col-sm">
                          <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" value="{{Auth::user()->name}}" @error('name') in-valid @enderror class="form-control" id="name">
                            <span>@error('name') {{$message}} @enderror</span>
                          </div>
                          <div class="form-group">
                            <label for="fname">Father's Name</label>
                            <input type="text" name="fname" @error('fname') in-valid @enderror class="form-control" id="fname">
                            <span>@error('fname') {{$message}} @enderror</span>
                          </div>
                        </div>
                      <div class="col-sm">
                        <div class="form-group">
                          <label for="name">Email</label>
                          <input type="email" name="email" value="{{Auth::user()->email}}" @error('email') in-valid @enderror class="form-control" id="name">
                          <span>@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="fname">Mobile</label>
                          <input type="number" name="mobile" @error('mobile') in-valid @enderror class="form-control" id="fname">
                          <span>@error('mobile') {{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <input type="text" name="gender" @error('gender') in-valid @enderror class="form-control" id="gender">
                          <span>@error('gender') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="fname">Date of Birth</label>
                          <input type="date" name="dob" @error('dob') in-valid @enderror class="form-control" id="fname">
                          <span>@error('dob') {{$message}} @enderror</span>
                        </div>
                      </div>
                  </div>
                  <h5 class="card-title">Address Details</h5>
                  <div class="row">
                      <div class="col-sm">
                          <div class="form-group">
                            <label for="addressa">Address 1</label>
                            <input type="text" name="addressa" @error('addressa') in-valid @enderror class="form-control" id="addressa">
                            <span>@error('addressa') {{$message}} @enderror</span>
                          </div>
                          <div class="form-group">
                            <label for="addressb">Address 2</label>
                            <input type="text" name="addressb" @error('addressb') in-valid @enderror class="form-control" id="addressb">
                            <span>@error('addressb') {{$message}} @enderror</span>
                          </div>
                        </div>
                      <div class="col-sm">
                        <div class="form-group">
                          <label for="landmark">Landmark</label>
                          <input type="text" name="landmark" @error('landmark') in-valid @enderror class="form-control" id="landmark">
                          <span>@error('landmark') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="dist">District</label>
                          <input type="text" name="district" @error('district') in-valid @enderror class="form-control" id="fname">
                          <span>@error('district') {{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                          <label for="state">State</label>
                          <input type="text" name="state" @error('state') in-valid @enderror class="form-control" id="state">
                          <span>@error('state') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="pincode">Area Pincode</label>
                          <input type="number" name="pincode" @error('pincode') in-valid @enderror class="form-control" id="pincode">
                          <span>@error('pincode') {{$message}} @enderror</span>
                        </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-info">Save</button>
                </div>
              </form>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Please complete the above details
                </div>
              </div>
            </div>
                @else
            <div class="card-body ">
              <div class="container">
                <div class="row">
                <h5 class="card-title">Personal Details</h5>
                <table class="table table-striped table-dark">
                  <tbody>
                    <tr>
                      <th>Full Name</th>
                      <td>{{$data->name}}</td>
                    </tr>
                    <tr>
                      <th>Father's Name</th>
                      <td>{{$data->fname}}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                      <th>Mobile</th>
                      <td>{{$data->mobile}}</td>
                    </tr>
                    <tr>
                      <th>Date of Birth</th>
                      <td>{{$data->dob}}</td>
                    </tr>
                    <tr>
                      <th>Address</th>
                      <td>{{$data->addressa}}, {{$data->addressb}} <br>
                        {{$data->landmark}}, {{$data->district}}<br>
                        {{$data->state}}, {{$data->pincode}}
                      </td>
                    </tr>
                  </tbody>
                </table>
                <a href="{{url('/personal/edit/'.$data->id)}}" class="btn btn-info">Edit/Modify</a>
              </div>
              <p align="right"><a href="{{url('academic/index')}}" class="btn btn-warning">Save and Next</a></p>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Your Data has been saved
                </div>
              </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>

@endsection
