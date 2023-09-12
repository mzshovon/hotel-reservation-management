@extends('admin.layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Roles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Roles</li>
          <li class="breadcrumb-item active">Create</li>
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
                        <h5 class="card-title">New role create from here with permission.</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="card-title">
                            <a href="{{ route('roles.index') }}" class="btn btn-success btn-sm">Back</a>
                        </h5>
                    </div>
                </div>
                <div class="basic-form">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @method('patch')
                        @csrf
                        <div class="form-row">
                            <label><b>Role Name</b></label>
                            <input value="{{ $role->name }}" type="text" class="form-control mb-3" name="name" placeholder="Name" required>

                            <h5 class="mb-3">Edit assigned permission to this role</h5>

                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th style="padding-left: 10px;"><input type="checkbox" name="all_permission"></th>
                                            <th>Name</th>
                                            <th>Guard</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='permission' {{ in_array($permission->name, $rolePermissions)
                                                    ? 'checked'
                                                    : '' }}>
                                            </td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </form>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('[name="all_permission"]').on('click', function() {

            if($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked',true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked',false);
                });
            }

        });
    });
</script>
@endpush