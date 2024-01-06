@extends('admin.layouts.master')
@section('body')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Room Type</li>
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
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($roomTypes as $key => $roomType)

                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $roomType['title'] }}</td>
                            <td>{{ $roomType['description'] }}</td>
                            <td>{{ $roomType['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                              <div class="d-flex">
                                  <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                                      onclick="modalShow(`{{ $roomType['id'] }}`, `{{ $roomType['title'] }}`, `{{ $roomType['description'] }}`, `{{ $roomType['status'] }}`)"><i
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

        </div>
        {{--  Create/Edit modal start  --}}
        <div class="modal fade" id="create-or-edit-modal" tabindex="-1" data-bs-backdrop="false">
          <div class="modal-dialog">
              <div class="modal-content">
                  <form action="{{ route('admin.createRoomType') }}" method="POST">
                      @csrf
                      <div class="modal-header">
                          <h5 class="modal-title">Create/Edit room type</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <input type="hidden" name="type_id" id="id_type">
                          <div class="modal-body">
                              <input type="text" class="form-control" placeholder="Enter title" name="title" id="id_title" required>
                              <br>
                              <textarea class="form-control" name="description" id="id_description" cols="15" rows="8" placeholder="Enter description"></textarea>
                              <br>
                              <select name="status" id="id_status" class="form-control">
                                <option id="option_id1" value="1">Active</option>
                                <option id="option_id0" value="0">Inactive</option>
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
      {{--  Create/Edit modal end  --}}
      </div>
    </section>

  </main><!-- End #main -->
@endsection

@push('script')
    <script>
        function modalShow(type_id, name, description, status) {
            if (type_id) {
                $("#id_type").val(type_id)
            } else{
                $("#id_type").val('')
            }
            if (name) {
                $("#id_title").val(name)
            } else{
                $("#id_title").val('')
            }
            if (name) {
              $("#id_description").val(description)
            } else{
                $("#id_description").val('')
            }
            if (status) {
                $("#option_id"+status).prop('selected',true)
            } else{
                $('#id_status').find($('option')).prop('selected',false)
            }
            $("#create-or-edit-modal").modal('show')
        }
    </script>
@endpush
