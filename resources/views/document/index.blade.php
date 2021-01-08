@extends('layouts.dashnew')
@section('pagetitle', 'Uploads, CAU, Imphal')
@section('title', 'Uploads')
@section('docs', 'active')
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
                <h5 class="card-category">Upload Photo and Signature</h5>
              </div>
              <div class="card-body ">
                @if(empty($data->userid))
                <form method="post" action="{{url('/document/store')}}" enctype="multipart/form-data">@csrf
                  <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                  <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Passport Photo</th>
                          <th scope="col">Signature</th>
                          <th scope="col">Instructions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row">
                            <input type="file" name="photo" accept="image/*" @error('photo') in-valid @enderror onchange="loadFilex(event)" class="form-control">
                          </td>
                          <td>
                            <input type="file" name="sign" @error('sign') in-valid @enderror accept="image/*" onchange="loadFiley(event)" class="form-control">
                          </td>
                            <td>Photo:
                              <br>
                              <ul>
                                <li>The Photo Size must be below between 20KB to 80KB only</li>
                                <li>The Photo must be clear with recommended dpi of 72</li>
                                <li>Recommended dimension is 200px by 160px</li>
                                <li>File type must be jpg,png or jpeg only</li>
                                <li>Selfie will not be considered as Passport Photo</li>
                              </ul>
                              Signature:
                                <br>
                                <ul>
                                  <li>The Signature Size must be below between 10KB to 80KB only</li>
                                  <li>The Signature must be clear with recommended dpi of 72</li>
                                  <li>File type must be jpg,png or jpeg only</li>
                                  <li>Recommended dimension is 60px by 160px</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                          <td>
                            <img id="photo" height="200px" width="160px"/><br>
                            <span>@error('photo') {{$message}} @enderror</span>
                            <script>
                              var loadFilex = function(event) {
                                var reader = new FileReader();
                                reader.onload = function(){
                                  var output = document.getElementById('photo');
                                  output.src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);
                              };
                            </script>
                          </td>
                          <td>
                              <img id="sign" height="60px" width="160px"/><br>
                              <span>@error('sign') {{$message}} @enderror</span>
                              <script>
                                var loadFiley = function(event) {
                                  var reader = new FileReader();
                                  reader.onload = function(){
                                    var output = document.getElementById('sign');
                                    output.src = reader.result;
                                  };
                                  reader.readAsDataURL(event.target.files[0]);
                                };
                              </script>
                          </td>
                        </tr>
                        <tr>
                          <td><button type="submit" class="btn btn-warning">Upload</button></td>
                        </tr>
                      </tbody>
                    </table>
                </form>
                @else
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Signature</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">
                          <img id="photo" src="../uploads/photo/{{$data->photo}}" height="200px" width="160px"/>
                        </td>
                        <td>
                          <img id="sign" src="../uploads/sign/{{$data->sign}}" height="60px" width="160px"/>
                        </td>
                          <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Edit Image
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
                                    <form method="post" action="{{url('/document/update/'.$data->id)}}" enctype="multipart/form-data">@csrf
                                      <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                      <table class="table">
                                          <thead class="thead-dark">
                                            <tr>
                                              <th scope="col">Photo</th>
                                              <th scope="col">Signature</th>
                                              <th scope="col">Instructions</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td scope="row">
                                                <input type="file" name="photo" accept="image/*" @error('photo') in-valid @enderror onchange="loadFilei(event)" class="form-control">
                                              </td>
                                              <td>
                                                <input type="file" name="sign" @error('sign') in-valid @enderror accept="image/*" onchange="loadFilej(event)" class="form-control">
                                              </td>
                                                <td>Photo:
                                                  <br>
                                                  <ul>
                                                    <li>The Photo Size must be below between 20KB to 100KB only</li>
                                                    <li>The Photo must be clear with recommended dpi of 72</li>
                                                    <li>Recommended dimension is 200px by 160px</li>
                                                    <li>Selfie will not be considered as Passport Photo</li>
                                                  </ul>
                                                  Signature:
                                                    <br>
                                                    <ul>
                                                      <li>The Signature Size must be below between 20KB to 100KB only</li>
                                                      <li>The Signature must be clear with recommended dpi of 72</li>
                                                      <li>Recommended dimension is 60px by 160px</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <img id="photo_edit" height="200px" width="160px"/><br>
                                                <span>@error('photo') {{$message}} @enderror</span>
                                                <script>
                                                  var loadFilei = function(event) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(){
                                                      var output = document.getElementById('photo_edit');
                                                      output.src = reader.result;
                                                    };
                                                    reader.readAsDataURL(event.target.files[0]);
                                                  };
                                                </script>
                                              </td>
                                              <td>
                                                  <img id="sign_edit" height="60px" width="160px"/><br>
                                                  <span>@error('sign') {{$message}} @enderror</span>
                                                  <script>
                                                    var loadFilej = function(event) {
                                                      var reader = new FileReader();
                                                      reader.onload = function(){
                                                        var output = document.getElementById('sign_edit');
                                                        output.src = reader.result;
                                                      };
                                                      reader.readAsDataURL(event.target.files[0]);
                                                    };
                                                  </script>
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
