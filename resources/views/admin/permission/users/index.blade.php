@extends('admin.layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Users list</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title">Users list</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="card-title">
                                        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Add new</a>
                                    </h5>
                                </div>
                            </div>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Assign Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @php
                                                    $usersRole = usersRole($user->id);
                                                @endphp

                                                @if (isset($usersRole->role))
                                                    <p class="bnt bnt-success">{{ $usersRole->role }}</p>
                                                    <a href="javascript:void(0)"
                                                        onclick="showAssignModal({{ $user->id }})"
                                                        class="btn btn-primary btn-sm">Re-assign</a>
                                                @else
                                                    <a href="javascript:void(0)"
                                                        onclick="showAssignModal({{ $user->id }})"
                                                        class="btn btn-info btn-sm">Assign</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                {{-- Assign modal start --}}
                <div class="modal fade" id="role-assign-modal" tabindex="-1" data-bs-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('assignRoleToUser') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Assign role to user...</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="user_id" id="id_user_id">
                                    <div class="modal-body">
                                        <select name="role_id" id="role_id" class="form-control" required>
                                            <option value="">Select a Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--  Assign modal end  --}}
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        function showAssignModal(user_id) {
            if (user_id) {
                $("#id_user_id").val(user_id)
            }
            $("#role-assign-modal").modal('show')
        }
    </script>
@endpush
