@extends('backend.layouts.app')

@section('page_title') Dashboard @endsection

@section('content')

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $info['excursion'] }}</h3>

              <p>Экскурсии</p>
            </div>
            <div class="icon">
              <i class="ion ion-compose"></i>
            </div>
            <a href="{{ route('admin.excursion.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $info['transaction'] }}</h3>

              <p>Транзакции</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('admin.transaction.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>0</h3>

              <p>В разработке</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>0</h3>

              <p>В разработке</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-chat"></i>
            </div>
            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

@endsection
