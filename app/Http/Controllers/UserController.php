<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\UpdateEmployeeRequest;
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
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'assets/documents';
                $file->move(public_path($filePath), $fileName);
                $data['cv'] = $filePath . '/' . $fileName;
            }
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
        $employeeList = Employee::orderBy('created_at', 'desc')->get();
        $personalRecord = Employee::find(session('user.id'));
        return view('Pages.Dashboard', compact('employeeList','personalRecord'));
    }

    public function updateEmployeeRecord(UpdateEmployeeRequest $request)
    {
        try{
            $data = $request->validated();
            $employee = Employee::findOrFail($data['id']);

            $employee->full_name = $data['full_name'] ?? $employee->full_name;
            $employee->email_address = $data['email_address'] ?? $employee->email_address;
            $employee->phone_number = $data['phone_number'] ?? $employee->phone_number;
            if (!empty($data['password'])) {
                $employee->password = Hash::make($data['password']);
            }

            if ($request->hasFile('cv')) {
                if (!empty($employee->cv) && file_exists(public_path($employee->cv))) {
                    unlink(public_path($employee->cv));
                }
                $file = $request->file('cv');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'assets/documents';
                $file->move(public_path($filePath), $fileName);
                $employee->cv = $filePath . '/' . $fileName;
            }
            $employee->save();
            return redirect()->route('dashboard')->with('success', 'Employee record updated successfully.');
        }
        catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput()->with('error','Validation Failed');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred. Please try again.')->withInput();
        }
    }

    public function deleteRecord($id) {
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
