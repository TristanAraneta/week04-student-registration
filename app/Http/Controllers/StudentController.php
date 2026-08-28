<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request)
{
    $validated = $request->validated();
    $validated['profile_picture'] = $this->storeProfilePicture($request);

    $student = Student::create($validated);

    return redirect()
        ->route('students.show', $student->id)
        ->with('success', 'Student registered successfully!');
}

private function storeProfilePicture($request): string
{
    return $request->file('profile_picture')->store('profile_pictures', 'public');
}

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}