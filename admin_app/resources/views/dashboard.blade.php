@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalUsers ?? 0 }}</h3>
                    <p>Total </p>
                </div>

                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>

                <a href="#" class="small-box-footer">
                    More Info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalCategories ?? 0 }}</h3>
                    <p>Total </p>
                </div>

                <div class="icon">
                    <i class="fas fa-list"></i>
                </div>

                <a href="#" class="small-box-footer">
                    More Info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalProducts ?? 0 }}</h3>
                    <p>Total </p>
                </div>

                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>

                <a href="#" class="small-box-footer">
                    More Info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalOrders ?? 0 }}</h3>
                    <p>Total </p>
                </div>

                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <a href="#" class="small-box-footer">
                    More Info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>
@endsection
