<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\SignInRequest;
use App\Models\Employee;
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
            $data['password'] = Hash::make($data['password']);
            Employee::create($data);
            return redirect()->route('index')->with('success', 'Employee Created Successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
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
        }
        catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred. Please try again.')->withInput();
        }
    }

    public function dashboard()
    {
        return view('Pages.Dashboard');
    }
}
