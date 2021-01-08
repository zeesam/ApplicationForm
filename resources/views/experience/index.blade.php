@extends('layouts.dashnew')
@section('pagetitle', 'Experience, CAU, Imphal')
@section('title', 'Experience')
@section('other', 'active')
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
                <h5 class="card-category">Experience Details</h5>
              </div>
              <div class="card-body ">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Add Experience Details
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <form method="post" action="{{url('/experience/store')}}">@csrf
                        <input type="hidden" name="userid" value="{{Auth::user()->id}}" class="form-control">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Experience Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="emporg">Employer/Organization</label>
                                    <input type="text" name="emporg" @error('emporg') in-valid @enderror class="form-control" id="emporg">
                                    <span>@error('emporg') {{$message}} @enderror</span>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="doj">Date of Joining</label>
                                    <input type="text" name="doj" @error('doj') in-valid @enderror class="form-control" id="doj">
                                    <span>@error('doj') {{$message}} @enderror</span>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="dol">Date of Leaing</label>
                                    <input type="text" name="dol" @error('dol') in-valid @enderror class="form-control" id="dol">
                                    <span>@error('dol') {{$message}} @enderror</span>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="exp">Total Experience</label>
                                    <input type="text" name="exp" @error('exp') in-valid @enderror class="form-control" id="exp">
                                    <span>@error('exp') {{$message}} @enderror</span>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="desig">Designation/Position</label>
                                    <input type="text" name="desig" @error('desig') in-valid @enderror class="form-control" id="desig">
                                    <span>@error('desig') {{$message}} @enderror</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employer/Organization</th>
                        <th scope="col">Date of Joining</th>
                        <th scope="col">Date of Leaving</th>
                        <th scope="col">Total Experience</th>
                        <th scope="col">Designation/Position</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $key=>$exp)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$exp->emporg}}</td>
                        <td>{{$exp->doj}}</td>
                        <td>{{$exp->dol}}</td>
                        <td>{{$exp->exp}}</td>
                        <td>{{$exp->desig}}</td>
                        <td>
                          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal2{{$exp->id}}">
                            Edit
                          </button>
                          <div class="modal fade" id="modal2{{$exp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <form method="post" action="{{url('/experience/update/'.$exp->id)}}">@csrf
                                  <input type="hidden" name="userid" value="{{Auth::user()->id}}" class="form-control">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add Experience Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                      <div class="row">
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="emporg">Employer/Organization</label>
                                              <input type="text" name="emporg" value="{{$exp->emporg}}" @error('emporg') in-valid @enderror class="form-control" id="exam">
                                              <span>@error('emporg') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="doj">Date of Joining</label>
                                              <input type="text" name="doj" value="{{$exp->doj}}" @error('doj') in-valid @enderror class="form-control" id="doj">
                                              <span>@error('board') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="dol">Date of Leaving</label>
                                              <input type="text" name="dol" value="{{$exp->dol}}" @error('dol') in-valid @enderror class="form-control" id="dol">
                                              <span>@error('dol') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="exp">Total Experience</label>
                                              <input type="text" name="exp" value="{{$exp->exp}}" @error('yearofpassing') in-valid @enderror class="form-control" id="exp">
                                              <span>@error('exp') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="desig">Designation/Position</label>
                                              <input type="text" name="desig" value="{{$exp->desig}}" @error('division') in-valid @enderror class="form-control" id="desig">
                                              <span>@error('desig') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <a href="{{url('experience/delete/'.$exp->id)}}" class="btn btn-outline-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table><br>
                  <p align="right"><a href="{{url('academic/index')}}" class="btn btn-warning">Previous</a><a href="{{url('fees/index')}}" class="btn btn-warning">Save and Next</a></p>
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
