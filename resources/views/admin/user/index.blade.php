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
                                            onclick="createEditModalShow(null,null,null)">Add new</a>
                                    </h5>
                                </div>
                            </div>

                            @if (Session::has('assignRoleMsg'))
                                <h6 style="color: green;" class="ml-3 mb-1">{{ Session::get('assignRoleMsg') }}</h6>
                            @endif
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Register Type</th>
                                        <th>Assign Role</th>
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
                                            <td>{{ isset($user['social_type']) && $user['social_type'] ? ucfirst($user['social_type']) : 'Portal' }}
                                            </td>

                                            <td>
                                                @php
                                                    $userRole = App\Models\User::userRole($user['id']);
                                                @endphp

                                                @if (isset($userRole->role))
                                                    <span class="badge bg-primary">{{ $userRole->role }}</span>
                                                    <a href="javascript:void(0)" class="badge bg-info bg-xs"
                                                        onclick="assignRoleModalShow(`{{ $user['id'] }}`, `{{ $userRole->role_id }}`)">Re-assign Role</a>
                                                @else
                                                    <a href="javascript:void(0)" class="badge bg-info bg-xs"
                                                        onclick="assignRoleModalShow(`{{ $user['id'] }}`, null)">Assign Role</a>
                                                @endif
                                            </td>

                                            <td>
                                                @if (isset($user['status']))
                                                    <span
                                                        class="badge bg-{{ $user['status'] == 1 ? 'success' : 'warning' }}">
                                                        <i
                                                            class="bi {{ $user['status'] == 1 ? 'bi-check-circle me-1' : 'bi-exclamation-triangle me-1' }}"></i>
                                                        {{ $user['status'] == 1 ? 'Active' : 'Inactive' }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="javascript:void(0)"
                                                        onclick="createEditModalShow(`{{ $user['name'] }}`, `{{ $user['email'] }}`, `{{ $user['status'] }}`, `{{ $user['id'] }}`)"
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

                    {{--  create/edit modal  --}}
                    <div class="modal fade" id="create-or-edit-modal" tabindex="-1" data-bs-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="submitModalForm" action="{{ route('admin.createUser') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create/Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id_user">
                                        <div class="modal-body">
                                            <input type="text" class="form-control" placeholder="Enter name"
                                                name="name" id="id_name" required>
                                            <br>
                                            <input type="email" class="form-control" placeholder="Enter email"
                                                name="email" id="id_email" required>
                                            <br>
                                            <select name="status" id="id_status" class="form-control">
                                                <option id="option_id1" value="1">Active</option>
                                                <option id="option_id0" value="0">Inactive</option>
                                            </select>
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
                    {{--  create/edit modal end  --}}

                    {{--  Assign modal start  --}}
                    <div class="modal fade" id="role-assign-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Assign role to user</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.assignRoleToUser') }}"
                                    method="POST" class="mx-3">
                                    @csrf
                                    <input type="hidden" name="user_id" id="id_user_id">
                                    <select name="role_id" id="id_role_id"
                                        class="form-control" required>
                                        <option value="">Select a Role</option>
                                        @foreach ($roles as $role)
                                            <option id="option_id{{ $role->id }}" value="{{ $role->id }}">
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit"
                                            class="btn btn-sm btn-primary light">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--  assign modal end  --}}

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('script')
    <script>
        function createEditModalShow(name, email, status, userId) {
            if (name) {
                $("#id_name").val(name);
            } else {
                $("#id_name").val('');
            }
            if (email) {
                $("#id_email").val(email);
            } else {
                $("#id_email").val('');
            }
            if (status) {
                $("#option_id" + status).prop('selected', true);
            } else {
                $('#id_status').find($('option')).prop('selected', false);
            }
            if (userId) {
                $("#id_user").val(userId);
                var url = '{{ route('admin.updateUser', ':userId') }}';
                url = url.replace(':userId', userId);
                $('#submitModalForm').attr('action', url);
            } else {
                $("#id_user").val('');
                $('#submitModalForm').attr('action', `{{ route('admin.createUser') }}`);
            }
            $("#create-or-edit-modal").modal('show')
        }

        function assignRoleModalShow(userId, roleId) {
            alert(roleId)
            if(userId == "" || userId == null){
                return false
            }
            $("#id_user_id").val(userId);
            if (roleId) {
                $("#option_id" + roleId).prop('selected', true);
            } else {
                $('#id_role_id').find($('option')).prop('selected', false);
            }
            $("#role-assign-modal").modal('show')
        }
    </script>
@endpush
