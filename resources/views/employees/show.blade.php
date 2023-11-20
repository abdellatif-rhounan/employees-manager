@extends('layouts.master')

@section('page-title', 'Employee Infos')

@section('view-css')
  @vite('resources/scss/pages/show_view.scss')
@endsection

@section('view-html')
  <div class="show-view">
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
        <h1 class="h3">Employee's Information :</h1>
        <a href="{{route('employees.show', $employee->id)}}" class="btn btn-info btn-sm">
          <i class="fa-solid fa-rotate"></i>
        </a>

        <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-warning btn-sm">
          <i class="fa-solid fa-edit"></i>
        </a>

        <form action="{{route('employees.destroy', $employee->id)}}" method="POST" class="d-inline-block">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="confirmation(event)">
            <i class="fa-solid fa-trash"></i>
          </button>
        </form>
      </div>
      
      <a href="{{route('employees.index')}}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-home"></i> &nbsp;Home
      </a>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="info-box">
          <h5>Personal Info :</h5>
          <ul>
            <li>
              <i class="fa-solid fa-user"></i>
              <div class="box-data">
                <span>First Name</span>
                <span>{{$employee->first_name ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-user"></i>
              <div class="box-data">
                <span>Last Name</span>
                <span>{{$employee->last_name ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-regular fa-id-card"></i>
              <div class="box-data">
                <span>Identity Number</span>
                <span>{{$employee->identity_number ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-phone"></i>
              <div class="box-data">
                <span>Phone</span>
                <span>{{$employee->phone ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-at"></i>
              <div class="box-data">
                <span>Email</span>
                <span>{{$employee->email ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-cake-candles"></i>
              <div class="box-data">
                <span>Date of Birth</span>
                <span>{{$employee->date_of_birth ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-flag"></i>
              <div class="box-data">
                <span>Nationality</span>
                <span>{{$employee->nationality ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-envelope"></i>
              <div class="box-data">
                <span>Address</span>
                <span>{{$employee->address ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-building-columns"></i>
              <div class="box-data">
                <span>Account RIB</span>
                <span>{{$employee->account_rib ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-suitcase-medical"></i>
              <div class="box-data">
                <span>Social Insurance Number</span>
                <span>{{$employee->social_insurance_number ?? 'Null'}}</span>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-6">
        <div class="info-box">
          <h5>Entreprise Related Info :</h5>
          <ul>
            <li>
              <i class="fa-solid fa-building"></i>
              <div class="box-data">
                <span>Department</span>
                <span>{{$employee->department ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-briefcase"></i>
              <div class="box-data">
                <span>Position</span>
                <span>{{$employee->position ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-clipboard-question"></i>
              <div class="box-data">
                <span>Status</span>
                <span>{{$employee->status ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-sack-dollar"></i>
              <div class="box-data">
                <span>Salary</span>
                <span>{{$employee->salary ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-arrows-to-dot"></i>
              <div class="box-data">
                <span>City Center</span>
                <span>{{$employee->city_center ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-flag"></i>
              <div class="box-data">
                <span>Country</span>
                <span>{{$employee->country ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-calendar-days"></i>
              <div class="box-data">
                <span>Hire Date</span>
                <span>{{$employee->hire_date ?? 'Null'}}</span>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-calendar-days"></i>
              <div class="box-data">
                <span>Terminataion Date</span>
                <span>{{$employee->termination_date ?? 'Null'}}</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('view-script')
  <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
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
