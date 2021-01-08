@extends('layouts.dashnew')
@section('pagetitle', 'Academic, CAU, Imphal')
@section('title', 'Academic')
@section('acad', 'active')
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
                <h5 class="card-category">Academic Details</h5>
              </div>
              <div class="card-body ">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Add Academic Details
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <form method="post" action="{{url('/academic/store')}}">@csrf
                        <input type="hidden" name="userid" value="{{Auth::user()->id}}" class="form-control">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Academic Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="exam">Exam</label>
                                    <input type="text" name="exam" @error('exam') in-valid @enderror class="form-control" id="exam">
                                    <span>@error('exam') {{$message}} @enderror</span>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="board">Board</label>
                                    <input type="text" name="board" @error('board') in-valid @enderror class="form-control" id="board">
                                    <span>@error('board') {{$message}} @enderror</span>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="pcogpa">Percentage or OGPA</label>
                                    <input type="text" name="pcogpa" @error('pcogpa') in-valid @enderror class="form-control" id="pcogpa">
                                    <span>@error('pcogpa') {{$message}} @enderror</span>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="yearofpassing">Year of Passing</label>
                                    <input type="text" name="yearofpassing" @error('yearofpassing') in-valid @enderror class="form-control" id="yearofpassing">
                                    <span>@error('yearofpassing') {{$message}} @enderror</span>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="division">Division</label>
                                    <input type="text" name="division" @error('division') in-valid @enderror class="form-control" id="division">
                                    <span>@error('division') {{$message}} @enderror</span>
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
                        <th scope="col">Exam</th>
                        <th scope="col">Board</th>
                        <th scope="col">Year of Passing</th>
                        <th scope="col">% or OGPA</th>
                        <th scope="col">Division</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $key=>$acad)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$acad->exam}}</td>
                        <td>{{$acad->board}}</td>
                        <td>{{$acad->yearofpassing}}</td>
                        <td>{{$acad->pcogpa}}</td>
                        <td>{{$acad->division}}</td>
                        <td>
                          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal2{{$acad->id}}">
                            Edit
                          </button>
                          <div class="modal fade" id="modal2{{$acad->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <form method="post" action="{{url('/academic/update/'.$acad->id)}}">@csrf
                                  <input type="hidden" name="userid" value="{{Auth::user()->id}}" class="form-control">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add Academic Details</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                      <div class="row">
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="exam">Exam</label>
                                              <input type="text" name="exam" value="{{$acad->exam}}" @error('exam') in-valid @enderror class="form-control" id="exam">
                                              <span>@error('exam') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="board">Board</label>
                                              <input type="text" name="board" value="{{$acad->board}}" @error('board') in-valid @enderror class="form-control" id="board">
                                              <span>@error('board') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="pcogpa">Percentage or OGPA</label>
                                              <input type="text" name="pcogpa" value="{{$acad->pcogpa}}" @error('pcogpa') in-valid @enderror class="form-control" id="pcogpa">
                                              <span>@error('pcogpa') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="yearofpassing">Year of Passing</label>
                                              <input type="text" name="yearofpassing" value="{{$acad->yearofpassing}}" @error('yearofpassing') in-valid @enderror class="form-control" id="yearofpassing">
                                              <span>@error('yearofpassing') {{$message}} @enderror</span>
                                            </div>
                                          </div>
                                          <div class="col-sm">
                                            <div class="form-group">
                                              <label for="division">Division</label>
                                              <input type="text" name="division" value="{{$acad->division}}" @error('division') in-valid @enderror class="form-control" id="division">
                                              <span>@error('division') {{$message}} @enderror</span>
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
                          <a href="{{url('academic/delete/'.$acad->id)}}" class="btn btn-outline-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table><br>
                  <p align="right"><a href="{{url('personal/index')}}" class="btn btn-warning">Previous</a><a href="{{url('experience/index')}}" class="btn btn-warning">Save and Next</a></p>
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
