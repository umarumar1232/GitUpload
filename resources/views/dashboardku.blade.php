@extends('layouts.custom')

@section('content')
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-info">
              <i class="fa-solid fa-user text-info"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">All Active Users</p>
              <p class="card-title">{{$userCount}}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center">
              <i class="fa-solid fa-pen-nib text-success"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">All Articles</p>
              <p class="card-title">{{$articleCount}}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center">
              <i class="fa-solid fa-globe text-danger"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">All Visitors</p>
              <p class="card-title">{{$countVisitors}}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-title">Visitors</h5>
        <p class="card-category">7 Days</p>
      </div>
      {!! $visitorChart->container() !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-title">Article Posted</h5>
        <p class="card-category">7 Days</p>
      </div>
      {!! $articlesPostedChart->container() !!}
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
{!! $visitorChart->script() !!}
{!! $articlesPostedChart->script() !!}

@endsection