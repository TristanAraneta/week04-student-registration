<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id'      => ['required', 'string', 'max:50', 'unique:students,student_id'],
            'first_name'      => ['required', 'string', 'max:100'],
            'middle_name'     => ['nullable', 'string', 'max:100'],
            'last_name'       => ['required', 'string', 'max:100'],
            'email'           => ['required', 'email', 'unique:students,email'],
            'mobile_number'   => ['required', 'numeric', 'digits_between:10,15'],
            'date_of_birth'   => ['required', 'date', 'before:today'],
            'gender'          => ['required', 'in:male,female,other'],
            'program'         => ['required', 'string', 'max:150'],
            'year_level'      => ['required', 'string', 'max:50'],
            'address'         => ['required', 'string'],
            'profile_picture' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required'      => 'Please enter your Student ID.',
            'student_id.unique'        => 'This Student ID is already registered.',
            'first_name.required'      => 'First name is required.',
            'last_name.required'       => 'Last name is required.',
            'email.required'           => 'An email address is required.',
            'email.email'              => 'Please enter a valid email address.',
            'email.unique'             => 'This email is already registered.',
            'mobile_number.required'   => 'Mobile number is required.',
            'mobile_number.numeric'    => 'Mobile number must contain digits only.',
            'date_of_birth.required'   => 'Date of birth is required.',
            'date_of_birth.before'     => 'Date of birth must be in the past.',
            'gender.required'          => 'Please select a gender.',
            'program.required'         => 'Please select a program.',
            'year_level.required'      => 'Please select a year level.',
            'address.required'         => 'Address is required.',
            'profile_picture.required' => 'A profile picture is required.',
            'profile_picture.image'    => 'The file must be an image.',
            'profile_picture.mimes'    => 'Only JPG, JPEG, or PNG files are allowed.',
            'profile_picture.max'      => 'Image size must not exceed 2MB.',
        ];
    }
}