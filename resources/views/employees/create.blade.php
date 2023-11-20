@extends('layouts.master')

@section('page-title', 'Add Employee')

@section('view-css')
  @vite('resources/scss/pages/edit_add_view.scss')
@endsection

@section('view-html')
  <div class="add-view">
    @if ($errors->any())
      <div class="row">
        <div class="col-6 mx-auto">
          <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
            <i class="fa-solid fa-triangle-exclamation fs-4 me-2"></i>
            <span>Please Fill Form with Valid Data</span>
            <button
              type="button"
              class="btn-close p-2"
              data-bs-dismiss="alert"
              aria-label="Close">
            </button>
          </div>
        </div>
      </div>
    @endif

    <div class="heading">
      <div>
        <h1 class="h3">Add Employee :</h1>
        <a href="{{route('employees.create')}}" class="btn btn-info btn-sm">
          <i class="fa-solid fa-rotate"></i>
        </a>
      </div>

      <a href="{{route('employees.index')}}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-home"></i> &nbsp;Home
      </a>
    </div>

    <form action="{{route('employees.store')}}" method="POST">
      @csrf

      <div class="row g-3">
        <div class="col-md-6 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('first-name') is-invalid @enderror"
            value="{{old('first-name')}}"
            name="first-name"
            placeholder="First Name"
            id="first-name"
          />

          <label for="first-name">First Name</label>

          @error('first-name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-6 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('last-name') is-invalid @enderror"
            value="{{old('last-name')}}"
            name="last-name"
            placeholder="Last Name"
            id="last-name"
          />
          
          <label for="last-name">Last Name</label>

          @error('last-name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-4 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('identity-number') is-invalid @enderror"
            value="{{old('identity-number')}}"
            name="identity-number"
            placeholder="Identity Number"
            id="identity-number"
          />
          
          <label for="identity-number">Identity Number</label>
          
          @error('identity-number')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-4 form-floating mb-3">
          <input
            type="date"
            class="form-control @error('date-of-birth') is-invalid @enderror"
            value="{{old('date-of-birth')}}"
            name="date-of-birth"
            placeholder="Date of Birth"
            id="date-of-birth"
          />
          
          <label for="date-of-birth">Date of Birth</label>
          
          @error('date-of-birth')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-4 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('nationality') is-invalid @enderror"
            value="{{old('nationality')}}"
            name="nationality"
            placeholder="Nationality"
            id="nationality"
          />
          
          <label for="nationality">Nationality</label>
          
          @error('nationality')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-4 form-floating mb-3">
          <input
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{old('email')}}"
            name="email"
            placeholder="Email"
            id="email"
          />
          
          <label for="email">Email</label>
          
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-4 form-floating mb-3">
          <input
            type="tel"
            class="form-control @error('phone') is-invalid @enderror"
            value="{{old('phone')}}"
            name="phone"
            placeholder="Phone Number"
            id="phone"
          />
          
          <label for="phone">Phone Number</label>
          
          @error('phone')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class="col-md-4 form-floating mb-3">
          <input 
            type="text"
            class="form-control @error('social-insurance-number') is-invalid @enderror"
            value="{{old('social-insurance-number')}}"
            name="social-insurance-number"
            placeholder="Social Insurance Number"
            id="social-insurance-number"
          />
          
          <label for="social-insurance-number">Social Insurance Number</label>
          
          @error('social-insurance-number')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-6 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('address') is-invalid @enderror"
            value="{{old('address')}}"
            name="address"
            placeholder="Address"
            id="address"
          />
          
          <label for="address">Address</label>
          
          @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class="col-md-6 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('account-rib') is-invalid @enderror"
            value="{{old('account-rib')}}"
            name="account-rib"
            placeholder="Account RIB Number"
            id="account-rib"
          />
          
          <label for="account-rib">Account RIB Number</label>
          
          @error('account-rib')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-6 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('department') is-invalid @enderror"
            value="{{old('department')}}"
            name="department"
            placeholder="Department"
            id="department"
          />
          
          <label for="department">Department</label>
          
          @error('department')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-6 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('position') is-invalid @enderror"
            value="{{old('position')}}"
            name="position"
            placeholder="Position"
            id="position"
          />
          
          <label for="position">Position</label>
          
          @error('position')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-4 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('status') is-invalid @enderror"
            value="{{old('status')}}"
            name="status"
            placeholder="Status"
            id="status"
          />
          
          <label for="status">Status</label>
          
          @error('status')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class="col-md-4 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('city-center') is-invalid @enderror"
            value="{{old('city-center')}}"
            name="city-center"
            placeholder="City Center"
            id="city-center"
          />
          
          <label for="city-center">City Center</label>
          
          @error('city-center')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class="col-md-4 form-floating mb-3">
          <input
            type="text"
            class="form-control @error('country') is-invalid @enderror"
            value="{{old('country')}}"
            name="country"
            placeholder="Country"
            id="country"
          />
          
          <label for="country">Country</label>
          
          @error('country')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-4 form-floating mb-3">
          <input
            type="number"
            class="form-control @error('salary') is-invalid @enderror"
            value="{{old('salary')}}"
            name="salary"
            placeholder="Salary"
            id="salary"
          />
          
          <label for="salary">Salary</label>
          
          @error('salary')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-4 form-floating mb-3">
          <input
            type="date"
            class="form-control @error('hire-date') is-invalid @enderror"
            value="{{old('hire-date')}}"
            name="hire-date"
            placeholder="Hire Date"
            id="hire-date"
          />
          
          <label for="hire-date">Hire Date</label>
          
          @error('hire-date')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-4 form-floating mb-3">
          <input
            type="date"
            class="form-control @error('termination-date') is-invalid @enderror"
            value="{{old('termination-date')}}"
            name="termination-date"
            placeholder="Termination Date"
            id="termination-date"
          />
          
          <label for="termination-date">Termination Date</label>
          
          @error('termination-date')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="d-grid gap-2">
        <button class="col-md-6 mx-auto btn btn-success" type="submit">Add Employee</button>
      </div>
    </form>
  </div>
@endsection
