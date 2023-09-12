@extends('admin.layouts.master')
@push('styles')
    <style>
        .alert.alert-danger {
            margin-top: 5px;
            padding: inherit;
        }
    </style>
@endpush
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
                                    <h5 class="card-title">New role create/edit from here...</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="card-title">
                                        <a href="{{ route('roles.index') }}" class="btn btn-success btn-sm">Back</a>
                                    </h5>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('users.store') }}" class="row g-3 needs-validation"
                                novalidate>
                                @csrf
                                <input type="hidden" value="{{ getValue('id', $user) }}" name="user_id">
                                <div class="col-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ getValue('name', $user) }}"
                                        class="form-control" id="name" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ getValue('email', $user) }}"
                                        class="form-control" id="yourEmail" required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" name="username" value="{{ getValue('username', $user) }}"
                                            class="form-control" id="yourUsername" required>
                                    </div>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control" id="yourPassword"
                                        @if (!$user) required @endif>
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="col-6">
                                    <label for="yourConfirmPassword">Confirm Password</label>
                                    <input type="password" id="yourConfirmPassword" value="{{ old('password') }}"
                                        class="form-control" name="password_confirmation"
                                        @if (!$user) required @endif>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
