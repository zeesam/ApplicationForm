@extends('layouts.dash')

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
                <h5 class="card-category">Application Details</h5>
                <h4 class="card-title">Critical Dates </h4>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Date of Advertisement</th>
                      <th scope="col">Last Date of Online Submission</th>
                      <th scope="col">Last Date of Hard Copy Submission</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <th>06-01-2021</th>
                      <th>30-01-2021</th>
                      <th>30-02-2021</th>
                    </tr>
                  </tbody>
                </table>
                <h4 class="card-title">Important Links </h4>
                <ul>
                  <li><a href="#" class="btn btn-success">Click Here</a> to download the Advertisement PDF File</li>
                  @if(empty($data))<li><a href="{{url('/academic/index')}}" class="btn btn-success">Click Here</a> to start/complete filling of online application</li>
                  @else<li><a href="#" class="btn btn-success">Click Here</a> to download the submitted Application</li>
                  @endif
                </ul>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">

                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
