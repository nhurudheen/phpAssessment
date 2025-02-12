<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;

class UserController extends Controller {
    public function index() {
        return view( 'Pages.Index' );
    }

    public function signUp() {
        return view( 'Pages.SignUp' );
    }
    public function createAccount(CreateEmployeeRequest $request)
    {
        try {
            $data = $request->validated();
            EmployeeService::createEmployee($data);
            return redirect()->route('index')->with('success', 'Employee Created Successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred. Please try again.')->withInput();
        }
    }

    public function signIn(SignInRequest $request)
    {
        try{
            $data = $request->validated();
            $employeeData = Employee::whereEmailAddress($data['email_address'])->first();
            if($employeeData && Hash::check($data['password'], $employeeData->password)) {
                Session::put('user', $employeeData);
                return redirect()->route('dashboard');
            }
            else{
                return back()->with('error', 'Invalid Credentials')->withInput();
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred. Please try again.')->withInput();
        }
    }

    public function dashboard()
    {
        $employeeList = Employee::orderBy('created_at', 'desc')->get();
        $personalRecord = Employee::find(session('user.id'));
        return view('Pages.Dashboard', compact('employeeList','personalRecord'));
    }

    public function updateEmployeeRecord(UpdateEmployeeRequest $request)
    {
        try{
            $data = $request->validated();
            EmployeeService::updateEmployee($data);
            return redirect()->route('dashboard')->with('success', 'Employee record updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function deleteRecord($id)
    {
        Employee::find($id)->delete();
        $route = ($id == Session::get('user.id')) ? 'logOut' : 'dashboard';
        return redirect()->route($route)->with('success', 'Employee record deleted successfully.');
    }

    public function logOut()
    {
        session()->flush();
        return redirect('/');
    }
}
