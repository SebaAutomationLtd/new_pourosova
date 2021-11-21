@extends('admin.layout.master')
@section('header')
<section class="content-header pl-3">
    <h1>ওয়েবসাইট</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
            </a>
        </li>


    </ol>
</section>
<!-- First Row Content -->
<div class="row">

    <!--Item -->
    <div class="col-sm-6 col-md-6 col-xl-3">
        <div class="flip">
            <div class="widget-bg-color-icon card-box front">
                <div class="bg-icon float-left">
                    <i class="ti-eye text-warning"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b>3752</b></h3>
                    <p>Daily Visits</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-bg-color-icon card-box back">
                <div class="text-center">
                    <span id="loadspark-chart"></span>
                    <hr>
                    <p>Check summary</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!---Item -->
    <div class="col-sm-6 col-md-6 col-xl-3">
        <div class="flip">
            <div class="widget-bg-color-icon card-box front">
                <div class="bg-icon float-left">
                    <i class="ti-shopping-cart text-success"></i>
                </div>
                <div class="text-right">
                    <h3><b id="widget_count3">3251</b></h3>
                    <p>Sales status</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-bg-color-icon card-box back">
                <div class="text-center">
                    <span class="linechart" id="salesspark-chart"></span>
                    <hr>
                    <p>Check summary</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-sm-6 col-md-6 col-xl-3">
        <div class="flip">
            <div class="widget-bg-color-icon card-box front">
                <div class="bg-icon float-left">
                    <i class="ti-thumb-up text-danger"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b>1532</b></h3>
                    <p>Hits</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-bg-color-icon card-box back">
                <div class="text-center">
                    <span id="visitsspark-chart"></span>
                    <hr>
                    <p>Check summary</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-sm-6 col-md-6 col-xl-3">
        <div class="flip">
            <div class="widget-bg-color-icon card-box front">
                <div class="bg-icon float-left">
                    <i class="ti-user text-info"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b>1252</b></h3>
                    <p>Subscribers</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-bg-color-icon card-box back">
                <div class="text-center">
                    <span id="subscribers-chart"></span>
                    <hr>
                    <p>Check summary</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>                  

</div>
<!--First Row End-->

<!--Second Row Start-->
<div class="row custom-dashboard">

    <!--Item-->
    <div class="col-md-3 col-sm-6">
        <div class="dashboard-content">
            <div class="d-flex justify-content-between p-3">
                <div class="display-4">
                    <i class="text-success fa fa-fw fa-bar-chart-o"></i>
                </div>
                <div>
                    <div class="h2">5454.5</div>
                    <span>Daily Visit</span>
                </div>
            </div>
            <div class="db-link">
                <a href="" class="bg-success">
                    Click For Details
                </a>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-md-3 col-sm-6">
        <div class="dashboard-content">
            <div class="d-flex justify-content-between p-3">
                <div class="display-4">
                    <i class="text-warning fa fa-fw fa-bars"></i>
                </div>
                <div>
                    <div class="h2">5454.5</div>
                    <span>Daily Visit</span>
                </div>
            </div>
            <div class="db-link">
                <a href="" class="bg-warning">
                    Click For Details
                </a>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-md-3 col-sm-6">
        <div class="dashboard-content">
            <div class="d-flex justify-content-between p-3">
                <div class="display-4">
                    <i class="text-info fa fa-fw fa-bullhorn"></i>
                </div>
                <div>
                    <div class="h2">5454.5</div>
                    <span>Daily Visit</span>
                </div>
            </div>
            <div class="db-link">
                <a href="" class="bg-info">
                    Click For Details
                </a>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-md-3 col-sm-6">
        <div class="dashboard-content">
            <div class="d-flex justify-content-between p-3">
                <div class="display-4">
                    <i class="text-primary fa fa-fw fa-download"></i>
                </div>
                <div>
                    <div class="h2">5454.5</div>
                    <span>Daily Visit</span>
                </div>
            </div>
            <div class="db-link">
                <a href="" class="bg-primary">
                    Click For Details
                </a>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-md-3 col-sm-6">
        <div class="dashboard-content">
            <div class="d-flex justify-content-between p-3">
                <div class="display-4">
                    <i class="text-secondary fa fa-fw fa-tasks"></i>
                </div>
                <div>
                    <div class="h2">5454.5</div>
                    <span>Daily Visit</span>
                </div>
            </div>
            <div class="db-link">
                <a href="" class="bg-secondary">
                    Click For Details
                </a>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-md-3 col-sm-6">
        <div class="dashboard-content">
            <div class="d-flex justify-content-between p-3">
                <div class="display-4">
                    <i class="text-danger fa fa-fw fa-sitemap"></i>
                </div>
                <div>
                    <div class="h2">5454.5</div>
                    <span>Daily Visit</span>
                </div>
            </div>
            <div class="db-link">
                <a href="" class="bg-danger">
                    Click For Details
                </a>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-md-3 col-sm-6">
        <div class="dashboard-content">
            <div class="d-flex justify-content-between p-3">
                <div class="display-4">
                    <i class="text-primary fa fa-fw fa-signal"></i>
                </div>
                <div>
                    <div class="h2">5454.5</div>
                    <span>Daily Visit</span>
                </div>
            </div>
            <div class="db-link">
                <a href="" class="bg-primary">
                    Click For Details
                </a>
            </div>
        </div>
    </div>

    <!--Item-->
    <div class="col-md-3 col-sm-6">
        <div class="dashboard-content">
            <div class="d-flex justify-content-between p-3">
                <div class="display-4">
                    <i class="text-warning fa fa-fw fa-exclamation-triangle"></i>
                </div>
                <div>
                    <div class="h2">5454.5</div>
                    <span>Daily Visit</span>
                </div>
            </div>
            <div class="db-link">
                <a href="" class="bg-warning">
                    Click For Details
                </a>
            </div>
        </div>
    </div>
</div>
<!--Second Row Start-->

<div class="row">
    <div class="col-sm-12 mt-3">
        <h5>সর্বশেষ ইউজার</h5>
        <hr>
    </div>
    <div class="col-sm-4">
        <div class="card p-0">
          <div class="card-body p-0">
            <h5 class="card-title d-flex p-2">
                <div><h5>বসত বাড়ী</h5></div>
                <div class="ml-auto">
                    <a href="" class="btn btn-sm btn-success">View All</a>
                </div>
            </h5>
            <table class="table table-bordered mb-0">
              <thead>
                <tr>
                  <th scope="col">নাম</th>
                  <th scope="col">মোবাইল</th>
                  <th scope="col">এন আই ডি / জন্ম নিবন্ধন </th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
          </tr>

      </tbody>
  </table>
</div>
</div>
</div>
<div class="col-sm-4">
                            <div class="card p-0">
  <div class="card-body p-0">
    <h5 class="card-title d-flex p-2">
        <div><h5>বাণিজ্যিক হোল্ডিং</h5></div>
        <div class="ml-auto">
            <a href="" class="btn btn-sm btn-success">View All</a>
        </div>
    </h5>
   <table class="table table-bordered mb-0">
  <thead>
    <tr>
      <th scope="col">নাম</th>
      <th scope="col">মোবাইল</th>
      <th scope="col">এন আই ডি / জন্ম নিবন্ধন </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>

  </tbody>
</table>
  </div>
</div>
</div>
<div class="col-sm-4">
                            <div class="card p-0">
  <div class="card-body p-0">
    <h5 class="card-title d-flex p-2">
        <div><h5>ব্যাবসা প্রতিষ্ঠান</h5></div>
        <div class="ml-auto">
            <a href="" class="btn btn-sm btn-success">View All</a>
        </div>
    </h5>
   <table class="table table-bordered mb-0">
  <thead>
    <tr>
      <th scope="col">নাম</th>
      <th scope="col">মোবাইল</th>
      <th scope="col">এন আই ডি / জন্ম নিবন্ধন </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>

  </tbody>
</table>
  </div>
</div>
</div>
</div>

<div class="row">
    <div class="col-sm-12 mt-3">
        <h5>সর্বশেষ সনদ গ্রহিতা </h5>
        <hr>
    </div>
    <div class="col-sm-4">
        <div class="card p-0">
          <div class="card-body p-0">
            <h5 class="card-title d-flex p-2">
                <div><h5>বসত বাড়ী</h5></div>
                <div class="ml-auto">
                    <a href="" class="btn btn-sm btn-success">View All</a>
                </div>
            </h5>
            <table class="table table-bordered mb-0">
              <thead>
                <tr>
                  <th scope="col">নাম</th>
                  <th scope="col">মোবাইল</th>
                  <th scope="col">এন আই ডি / জন্ম নিবন্ধন </th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
          </tr>

      </tbody>
  </table>
</div>
</div>
</div>
<div class="col-sm-4">
                            <div class="card p-0">
  <div class="card-body p-0">
    <h5 class="card-title d-flex p-2">
        <div><h5>বাণিজ্যিক হোল্ডিং</h5></div>
        <div class="ml-auto">
            <a href="" class="btn btn-sm btn-success">View All</a>
        </div>
    </h5>
   <table class="table table-bordered mb-0">
  <thead>
    <tr>
      <th scope="col">নাম</th>
      <th scope="col">মোবাইল</th>
      <th scope="col">এন আই ডি / জন্ম নিবন্ধন </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>

  </tbody>
</table>
  </div>
</div>
</div>
<div class="col-sm-4">
                            <div class="card p-0">
  <div class="card-body p-0">
    <h5 class="card-title d-flex p-2">
        <div><h5>ব্যাবসা প্রতিষ্ঠান</h5></div>
        <div class="ml-auto">
            <a href="" class="btn btn-sm btn-success">View All</a>
        </div>
    </h5>
   <table class="table table-bordered mb-0">
  <thead>
    <tr>
      <th scope="col">নাম</th>
      <th scope="col">মোবাইল</th>
      <th scope="col">এন আই ডি / জন্ম নিবন্ধন </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>

  </tbody>
</table>
  </div>
</div>
</div>
</div>
@stop





