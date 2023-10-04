@extends('admin.inc.main')

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

   @section('content')

  </header><!-- End Header -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sliders</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item">Sliders</li>
          <li class="breadcrumb-item active">View Slider</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Slider
                <a href="{{url('/admin/sliders')}}" class="btn btn-danger float-end">Back</a>
              </h5><br>
              <p>Title : <b>{{ $slider->title }}</b></p>
              <p>Description : <b>{{ $slider->description }}</b></p>
              <img src="/sliders/{{ $slider->image }}" class="rounded" width="100%" alt="">
              {{-- <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" readonly value="#" id="inputNanme4">
                </div>
                <div class="col-md-6">
                  <label for="inputNanme4" class="form-label">Description</label>
                  <input type="text" name="description" class="form-control" readonly value="#" id="inputNanme4">
                </div>
                <div class="col-md-6 overflow-hidden">
                  <img src="#" alt="" srcset="" width="150px" height="140px">
                  <label for="inputPhone" class="form-label">#</label>
                  <!-- <input type="file" name="dataFile" class="form-control" readonly id="inputPhone"> -->
                </div>
              </form> --}}
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection