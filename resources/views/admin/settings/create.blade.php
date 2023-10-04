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
      <h1>Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Create Settings</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Setting
                <a href="{{url('/admin/settings')}}" class="btn btn-danger float-end">Back</a>
              </h5><br>
              @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                  </div>
              @endif
              <form class="row g-3" action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="inputNanme4" class="form-label">Key</label>
                  <input type="text" name="site_key" class="form-control" value="{{old('site_key')}}" id="inputNanme4">
                  <p class="text-danger">@error('site_key')
                    {{ $message}}
                  @enderror</p>
                </div>
                <div class="col-md-6">
                  <label for="inputNanme4" class="form-label">Value</label>
                  <input type="text" name="site_value" class="form-control" value="{{old('site_value')}}" id="inputNanme4">
                  <p class="text-danger">@error('site_value')
                    {{ $message}}
                  @enderror</p>
                </div>
                <div class="text-start">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection
