<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Models\Employee;
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
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'assets/documents';
                $file->move(public_path($filePath), $fileName);
                $data['cv'] = $filePath . '/' . $fileName;
            }
            $data['password'] = Hash::make($data['password']);
            Employee::create($data);
            return $this->successResponse(statusCode: 200,message: "Employee Account created successful");
        } catch (Exception $e) {
            return $this->errorResponse(message: $e->getMessage());
        }
    }
}
