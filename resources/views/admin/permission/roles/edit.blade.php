@extends('admin.layouts.master')
@section('body')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Roles</li>
                <li class="breadcrumb-item active">Edit</li>
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
                        <h5 class="card-title">Edit role from here with permission.</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="card-title">
                            <a href="{{ route('admin.rolesList') }}" class="btn btn-success btn-sm">Back</a>
                        </h5>
                    </div>
                </div>
                <div class="basic-form">
                    <form method="POST" action="{{ route('admin.updateRoles', $role->id) }}">
                        @method('patch')
                        @csrf
                        <div class="form-row">
                            <label><b>Role Name</b></label>
                            <input value="{{ $role->name }}" type="text" class="form-control mb-3" name="name" placeholder="Name" required>

                            <h5 class="mb-3">Edit assigned permission to this role</h5>

                                <table class="table">
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

@push('script')
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
