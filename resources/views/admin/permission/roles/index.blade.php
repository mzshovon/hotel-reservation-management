@extends('admin.layouts.master')
@section('body')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Roles</li>
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
                        <h5 class="card-title">Roles list</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="card-title">
                            <a href="{{ route('admin.createRoles') }}" class="btn btn-success btn-sm">Add new</a>
                        </h5>
                    </div>
                </div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.editRoles',$role->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
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
  </main>
@endsection
