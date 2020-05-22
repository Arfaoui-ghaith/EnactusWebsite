@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">


        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_paste</i>
              </div>
              <p class="card-category">Administrative Members</p>
              <h3 class="card-title">
                <small>+</small>
              </h3>
            </div>
            <div class="card-footer">
            
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">library_books</i>
              </div>
              <p class="card-category">Projects</p>
              <h3 class="card-title"><small>+</small></h3> 
            </div>
            <div class="card-footer">
             
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">bubble_chart</i>
              </div>
              <p class="card-category">Events</p>
              <h3 class="card-title"><small>+</small></h3>
            </div>
            <div class="card-footer">
              
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">language</i>
              </div>
              <p class="card-category">Partners</p>
              <h3 class="card-title"><small>+</small></h3>
            </div>
            <div class="card-footer">
             
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
@endsection

