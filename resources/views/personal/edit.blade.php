@extends('layouts.dashnewnew')
@section('pagetitle', 'Personal, CAU, Imphal')
@section('title', 'Personal')
@section('personal', 'active')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Personal Details</h5>
              </div>
              <div class="card-body ">
                <form method="post" action="{{url('/personal/update/'.$data->id)}}">@csrf
                  <input type="hidden" name="userid" value="{{Auth::user()->id}}" class="form-control">
                <div class="container">
                  <h5 class="card-title">Personal Profile</h5>
                  <div class="row">
                      <div class="col-sm">
                          <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" value="{{$data->name}}" @error('name') in-valid @enderror class="form-control" id="name">
                            <span>@error('name') {{$message}} @enderror</span>
                          </div>
                          <div class="form-group">
                            <label for="fname">Father's Name</label>
                            <input type="text" name="fname" value="{{$data->fname}}" @error('fname') in-valid @enderror class="form-control" id="fname">
                            <span>@error('fname') {{$message}} @enderror</span>
                          </div>
                        </div>
                      <div class="col-sm">
                        <div class="form-group">
                          <label for="name">Email</label>
                          <input type="email" name="email" value="{{$data->email}}" @error('email') in-valid @enderror class="form-control" id="name">
                          <span>@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="fname">Mobile</label>
                          <input type="number" name="mobile" value="{{$data->mobile}}" @error('mobile') in-valid @enderror class="form-control" id="fname">
                          <span>@error('mobile') {{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <input type="text" name="gender" value="{{$data->gender}}" @error('gender') in-valid @enderror class="form-control" id="gender">
                          <span>@error('gender') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="fname">Date of Birth</label>
                          <input type="date" name="dob" value="{{$data->dob}}" @error('dob') in-valid @enderror class="form-control" id="fname">
                          <span>@error('dob') {{$message}} @enderror</span>
                        </div>
                      </div>
                  </div>
                  <h5 class="card-title">Address Details</h5>
                  <div class="row">
                      <div class="col-sm">
                          <div class="form-group">
                            <label for="addressa">Address 1</label>
                            <input type="text" name="addressa" value="{{$data->addressa}}" @error('addressa') in-valid @enderror class="form-control" id="addressa">
                            <span>@error('addressa') {{$message}} @enderror</span>
                          </div>
                          <div class="form-group">
                            <label for="addressb">Address 2</label>
                            <input type="text" name="addressb" value="{{$data->addressb}}" @error('addressb') in-valid @enderror class="form-control" id="addressb">
                            <span>@error('addressb') {{$message}} @enderror</span>
                          </div>
                        </div>
                      <div class="col-sm">
                        <div class="form-group">
                          <label for="landmark">Landmark</label>
                          <input type="text" name="landmark" value="{{$data->landmark}}" @error('landmark') in-valid @enderror class="form-control" id="landmark">
                          <span>@error('landmark') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="dist">District</label>
                          <input type="text" name="district" value="{{$data->district}}" @error('district') in-valid @enderror class="form-control" id="fname">
                          <span>@error('district') {{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                          <label for="state">State</label>
                          <input type="text" name="state" value="{{$data->state}}" @error('state') in-valid @enderror class="form-control" id="state">
                          <span>@error('state') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="pincode">Area Pincode</label>
                          <input type="number" value="{{$data->pincode}}" name="pincode" @error('pincode') in-valid @enderror class="form-control" id="pincode">
                          <span>@error('pincode') {{$message}} @enderror</span>
                        </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-info">Save</button>
                </div>
              </form>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Please complete the above details
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
