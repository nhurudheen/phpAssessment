<?php

namespace App\Services;
use App\Exceptions\HttpException;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    public static function createEmployee(array $data)
    {
        if (isset($data['cv']) && $data['cv']->isValid()) {
            $file = $data['cv'];
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'assets/documents';
            $file->move(public_path($filePath), $fileName);
            $data['cv'] = $filePath . '/' . $fileName;
        }
        $data['password'] = Hash::make($data['password']);
        return Employee::create($data);
    }

    /**
     * @throws HttpException
     */
    public static function updateEmployee(array $data)
    {
        $employee = Employee::findOrFail($data['id']);

        $isEmailExist = Employee::whereEmailAddress($data['email_address'])
            ->where('id', '!=', $employee->id)
            ->exists();

        if ($isEmailExist) {
            throw new HttpException( 'Email address already exists for another employee.', 422);
        }

        // Check if phone number belongs to another user
        $isPhoneNumberExist = Employee::wherePhoneNumber($data['phone_number'])
            ->where('id', '!=', $employee->id)
            ->exists();

        if ($isPhoneNumberExist) {
            throw new HttpException( 'Phone number already exists for another employee.',422);
        }

        // Update fields
        $employee->full_name = $data['full_name'] ?? $employee->full_name;
        $employee->email_address = $data['email_address'] ?? $employee->email_address;
        $employee->phone_number = $data['phone_number'] ?? $employee->phone_number;

        if (!empty($data['password'])) {
            $employee->password = Hash::make($data['password']);
        }

        // Handle CV upload
        if (isset($data['cv']) && $data['cv']->isValid()) {
            if (!empty($employee->cv) && file_exists(public_path($employee->cv))) {
                unlink(public_path($employee->cv));
            }

            $file = $data['cv'];
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'assets/documents';
            $file->move(public_path($filePath), $fileName);
            $employee->cv = $filePath . '/' . $fileName;
        }

        $employee->save();
        return $employee;
    }
}
