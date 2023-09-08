@extends('admin.layouts.master')
@section('body')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-10">
                    <h5 class="card-title">{{ $title }}</h5>
                </div>
                <div class="col-2">
                    <h5 class="card-title">
                        <a href="javascript:void(0)" class="btn btn-success btn-sm"
                            onclick="modalShow(null,null,null)">Add new</a>
                    </h5>
                </div>
            </div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Register Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)

                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ ucfirst($user['social_type']) ?? 'Portal' }}</td>
                            <td>
                                <span class="badge bg-{{ $user['status'] == 1 ? 'success' : 'warning' }}">
                                    <i class="bi {{ $user['status'] == 1 ? 'bi-check-circle me-1' : 'bi-exclamation-triangle me-1' }}"></i>
                                    {{ $user['status'] == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                              <div class="d-flex">
                                  <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                              </div>
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
