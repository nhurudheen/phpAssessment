<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateCustomerRecordRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeRecord;
use App\Models\Employee;
use App\Services\EmployeeService;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class APIController extends Controller
{
    use JsonResponseTrait;
    public function testing() {
        return $this->successResponse(message: "API Testing");
    }

    public function createAccount(CreateEmployeeRequest $request)
    {
        try {
            $data = $request->validated();
            EmployeeService::createEmployee($data);
            return $this->successResponse(statusCode: 200,message: "Employee Account created successful");
        } catch (Exception $e) {
            return $this->errorResponse(message: $e->getMessage());
        }
    }

    public function employeeRecords()
    {
        $allEmployeeRecord = Employee::orderBy('created_at', 'desc')->get();
        return $this->successDataResponse(data: EmployeeRecord::collection($allEmployeeRecord));
    }

    public function fetchEmployeeRecord(Request $request, string $employeePhoneNumber)
    {
        $employeeRecord = Employee::wherePhoneNumber($employeePhoneNumber)->first();
        if (!$employeeRecord) {
            return $this->errorResponse(message: 'Employee not found');
        }
        return $this->successDataResponse(data: EmployeeRecord::make($employeeRecord));
    }

    public function updateEmployeeRecord(UpdateCustomerRecordRequest $request)
    {
        try{
            $data = $request->validated();
            $data['id'] = Employee::wherePhoneNumber($data['phone_number'])->value('id');
            EmployeeService::updateEmployee($data);
            return $this->successResponse(statusCode: 200,message: "Employee Account updated successful");
        } catch (\Exception $e) {
            return $this->errorResponse(message: $e->getMessage());
        }
    }
}
