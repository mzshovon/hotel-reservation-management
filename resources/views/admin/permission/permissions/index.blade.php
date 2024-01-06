@extends('admin.layouts.master')
@section('body')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Permissions</li>
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
                                    <h5 class="card-title">Permissions</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="card-title">
                                        <a href="javascript:void(0)" class="btn btn-success btn-sm"
                                            onclick="modalShow(null,null)">Add new</a>
                                    </h5>
                                </div>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Guard</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $key => $permission)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $permission['name'] }}</td>
                                            <td>{{ $permission['guard_name'] }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="javascript:void(0)"
                                                        onclick="modalShow(`{{ $permission['id'] }}`, `{{ $permission['name'] }}`)"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                    <div class="modal fade" id="create-or-edit-modal" tabindex="-1" data-bs-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="submitModalForm" action="{{ route('admin.storePermissions') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create/Edit Permission</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="permission_id" id="id_permission">
                                        <div class="modal-body">
                                            <input type="text" class="form-control" placeholder="Enter name"
                                                name="name" id="id_name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('script')
    <script>
        function modalShow(permission_id, name) {
            if (name) {
                $("#id_name").val(name);
            } else {
                $("#id_name").val('');
            }
            if (permission_id) {
                $("#id_permission").val(permission_id);
            } else {
                $("#id_permission").val('');
            }
            $("#create-or-edit-modal").modal('show')
        }
    </script>
@endpush
