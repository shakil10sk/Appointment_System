@extends('layouts.mentor_layouts.mentor_layout')

@section('Content')

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $pendding }}</h3>

              <p>Pending User</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ $accept }}</h3>

              <p>Accepted User</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  --}}
          </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $reject }}</h3>

                <p>Rejected User</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  --}}
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $complete }}</h3>

                <p>Completed User</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  --}}
            </div>
          </div>


      </div>

    </div><!-- /.container-fluid -->
  </section>

@endsection
