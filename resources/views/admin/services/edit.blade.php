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
      <h1>Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item">Services</li>
          <li class="breadcrumb-item active">Edit Service</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Service #{{$service->title}}
                <a href="{{url('/admin/services')}}" class="btn btn-danger float-end">Back</a>
              </h5><br>
              @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                  </div>
              @endif
              <form class="row g-3" action="{{route('services.update',$service->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                  <label for="inputNanme4" class="form-label">Icon</label>
                  <input type="text" name="icon" class="form-control" value="{{old('icon',$service->icon)}}" id="inputNanme4">
                  <p class="text-danger">@error('icon')
                    {{ $message}}
                  @enderror</p>
                </div>
                <div class="col-md-6">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" value="{{old('title',$service->title)}}" id="inputNanme4">
                  <p class="text-danger">@error('title')
                    {{ $message}}
                  @enderror</p>
                </div>
                <div class="col-md-6">
                  <label for="inputNanme4" class="form-label">Description</label>
                  <textarea type="text" name="description" rows="3" class="form-control" id="inputNanme4">{{old('description',$service->description)}}</textarea>
                  <p class="text-danger">@error('description')
                    {{ $message}}
                  @enderror</p>
                </div>
                <div class="text-start">
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection
