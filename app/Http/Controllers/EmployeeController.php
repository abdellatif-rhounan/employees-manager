<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class EmployeeController extends Controller
{
    public $current_route;

    public function __construct()
    {
        $this->current_route = Route::currentRouteName();
    }

    public function index()
    {
        $data = Employee::select('id', 'first_name', 'last_name', 'department', 'position')
                    ->get();

        return view('employees.index', ['employees' => $data, 'current_route' => $this->current_route]);
    }

    public function create()
    {
        return view('employees.create', ['current_route' => $this->current_route]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create([
            'id' => Str::uuid(),
            'first_name' => $request['first-name'],
            'last_name' => $request['last-name'],
            'identity_number' => $request['identity-number'],
            'date_of_birth' => $request['date-of-birth'],
            'nationality' => $request['nationality'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'social_insurance_number' => $request['social-insurance-number'],
            'department' => $request['department'],
            'position' => $request['position'],
            'status' => $request['status'],
            'city_center' => $request['city-center'],
            'country' => $request['country'],
            'salary' => $request['salary'],
            'account_rib' => $request['account-rib'],
            'hire_date' => $request['hire-date'],
            'termination_date' => $request['termination-date']
        ]);

        return to_route('employees.index')
            ->with('success-alert', 'The Employee has been inserted successfully');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee, 'current_route' => $this->current_route]);
    }
    
    public function edit(Employee $employee)
    {
        return view('employees.edit', ['employee' => $employee, 'current_route' => $this->current_route]);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'id'                        => $employee['id'],
            //*********************
            'first_name'                => $request['first-name'],
            'last_name'                 => $request['last-name'],
            'identity_number'           => $request['identity-number'],
            'date_of_birth'             => $request['date-of-birth'],
            'nationality'               => $request['nationality'],
            //*********************
            'email'                     => $employee['email'],
            'phone'                     => $request['phone'],
            'address'                   => $request['address'],
            'social_insurance_number'   => $request['social-insurance-number'],
            //*********************
            'department'                => $request['department'],
            'position'                  => $request['position'],
            'status'                    => $request['status'],
            'city_center'               => $request['city-center'],
            'country'                   => $request['country'],
            'salary'                    => $request['salary'],
            'account_rib'               => $request['account-rib'],
            'hire_date'                 => $request['hire-date'],
            'termination_date'          => $request['termination-date'],
        ]);

        return to_route('employees.show', $employee->id)
            ->with('success-alert', 'The Employee has been updated successfully');
    }

    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);

        return to_route('employees.index')
            ->with('success-alert', 'The indicated Employee has been deleted successfully.');
    }
}
