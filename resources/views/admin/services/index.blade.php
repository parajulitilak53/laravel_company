@extends('admin.inc.main')
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
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
      <h1>Manage Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item">Services</li>
          <li class="breadcrumb-item active">Manage Services</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                Manage Services
                <a href="{{url('/admin/services/create')}}" class="btn btn-primary float-end">Add Services</a>
              </h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sno.</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($services as $service )
                  <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td><a href="services/{{ $service->id }}/show" class="text-dark">{{ $service->icon }}</a></td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td>
                      <a class="btn-sm btn btn-outline-primary" href="{{route('services.edit',$service->id)}}" role="button"><i class="bi bi-pen"></i> </a>
                      <a class=" btn-sm btn" href="{{route('services.show',$service->id)}}" role="button"><i class="bi bi-eye text-info"></i> </a>
                      {{-- <a class=" btn-sm btn" href="#" onclick="return confirm('Are you to delete data??');" role="button"><i class="bi bi-trash text-danger"></i> </a> --}}
                      <form action="{{route('services.destroy',$service->id)}}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn" onclick="return confirm('Are you to delete data??');"><i class="bi bi-trash text-danger"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 @endsection
