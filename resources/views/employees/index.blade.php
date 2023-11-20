@extends('layouts.master')

@section('page-title', 'List of Employees')

@section('view-css')
  <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet" />
  @vite('resources/scss/pages/index_view.scss')
@endsection

@section('view-html')
  <div class="index-view">
    @if (session()->has('success-alert'))
      <div class="alert alert-success alert-dismissible fade show p-2" id="success-alert" role="alert">
        <i class="fa-solid fa-circle-check fs-4 me-2"></i>
        {{session('success-alert')}}
        <button
          type="button"
          class="btn-close p-2"
          data-bs-dismiss="alert"
          aria-label="Close">
        </button>
      </div>
    @endif

    <div class="heading">
      <div>
        <h1 class="h3">List of Employees :</h1>
        <a href="{{route('employees.index')}}" class="btn btn-info btn-sm">
          <i class="fa-solid fa-rotate"></i>
        </a>
      </div>
      <a href="{{route('employees.create')}}" class="btn btn-primary btn-sm">
        <i class="fa-regular fa-square-plus"></i> &nbsp;Add Employee
      </a>
    </div>

    <table id="table-employees" class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Department</th>
          <th scope="col">Position</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $i => $employee)
          <tr>
            <td scope="row"><i><b>{{++$i}}</b></i></td>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>{{$employee->department}}</td>
            <td>{{$employee->position}}</td>
            <td>
              <a href="{{route('employees.show', $employee->id)}}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-eye"></i>
              </a>
              <a class="btn btn-warning btn-sm mx-1" href="{{route('employees.edit', $employee->id)}}">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
              <form action="{{route('employees.destroy', $employee->id)}}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="confirmation(event)">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@push('view-script')
  {{-- Dependencies JS --}}
  <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
  <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
  <script>
    $('#table-employees').DataTable({
      lengthMenu: [5, 10, 20, 30],
      columnDefs: [
        { orderable: false, targets: 5 },
        { searchable: false, target: [0, 5] },
        { width: '30px', targets: 0 },
        { width: '17%', target: [1, 2, 3] },
        { width: '115px', targets: 5 },
      ]
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
  <script>
    setTimeout(() => {
      $("#success-alert").fadeOut(600);
    }, 5000);

    function confirmation(event) {
      event.preventDefault();

      Swal.fire({
        title: "Delete This Employee ?",
        text: "You won't be able to revert this!",
        icon: "warning",
        iconColor: '#dc3545',
        confirmButtonText: 'Yes, Delete',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        reverseButtons: true,
        showCloseButton: true,
        timer: 7000,
      }).then((result) => {
        if (result.isConfirmed) {
          if (event.target.parentElement.nodeName === 'FORM') {
            event.target.parentElement.submit();
          } else {
            event.target.parentElement.parentElement.submit();
          }
        }
      });
    }
  </script>
@endpush
