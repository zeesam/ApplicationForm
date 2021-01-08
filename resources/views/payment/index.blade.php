@extends('layouts.dashnew')
@section('pagetitle', 'Payment, CAU, Imphal')
@section('title', 'Payments')
@section('payment', 'active')
@section('content')
    <div class="content">
        <div class="row">
          @if(Session::has('message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          <div class="col-md-12">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Payment Details</h5>
              </div>
              <div class="card-body ">
                @if(empty($data->userid))
                <form method="post" action="{{url('/payment/store')}}">@csrf
                  <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                  <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">SBI Collect Reference Number</th>
                          <th scope="col">Date of Payment</th>
                          <th scope="col">Instructions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row">
                            <input type="text" name="sbicol" @error('sbicol') in-valid @enderror class="form-control">
                            <span>@error('sbicol') {{$message}} @enderror</span>
                          </td>
                          <td>
                            <input type="date" name="dop" @error('dop') in-valid @enderror class="form-control">
                            <span>@error('dop') {{$message}} @enderror</span>
                          </td>
                            <td>Payment Instructions
                              <br>
                              <ul>
                                <li>The Photo Size must be below between 20KB to 80KB only</li>
                                <li>The Photo must be clear with recommended dpi of 72</li>
                                <li>Recommended dimension is 200px by 160px</li>
                                <li>File type must be jpg,png or jpeg only</li>
                                <li>Selfie will not be considered as Passport Photo</li>
                              </ul>
                            </td>
                        </tr>
                        <tr>
                          <td><button type="submit" class="btn btn-warning">Save</button></td>
                        </tr>
                      </tbody>
                    </table>
                </form>
                @else
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">SBI Collect Reference Number</th>
                        <th scope="col">Date of Payment</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">
                          {{$data->sbicol}}
                        </td>
                        <td>
                          {{$data->dop}}
                        </td>
                          <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Edit details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post" action="{{url('/payment/update/'.$data->id)}}" enctype="multipart/form-data">@csrf
                                      <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                      <table class="table">
                                          <thead class="thead-dark">
                                            <tr>
                                              <th scope="col">SBI Collect Reference Number</th>
                                              <th scope="col">Date of Payment</th>
                                              <th scope="col">Instructions</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td scope="row">
                                                <input type="text" name="sbicol" value="{{$data->sbicol}}" @error('sbicol') in-valid @enderror class="form-control">
                                                <span>@error('sbicol') {{$message}} @enderror</span>
                                              </td>
                                              <td>
                                                <input type="date" name="dop" value="{{$data->dop}}" @error('dop') in-valid @enderror class="form-control">
                                                <span>@error('dop') {{$message}} @enderror</span>
                                              </td>
                                                <td>Payment Instructions:
                                                  <br>
                                                  <ul>
                                                    <li>The Photo Size must be below between 20KB to 80KB only</li>
                                                    <li>The Photo must be clear with recommended dpi of 72</li>
                                                    <li>Recommended dimension is 200px by 160px</li>
                                                    <li>File type must be jpg,png or jpeg only</li>
                                                    <li>Selfie will not be considered as Passport Photo</li>
                                                  </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td><button type="submit" class="btn btn-warning">Upload</button></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>
                    </tbody>
                  </table>
                @endif
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
