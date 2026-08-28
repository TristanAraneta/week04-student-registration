@extends('layouts.app')

@section('title', 'All Students')

@section('content')
<div class="bg-white shadow rounded-xl p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Registered Students</h1>

    <div class="divide-y">
        @forelse ($students as $student)
            <a href="{{ route('students.show', $student->id) }}"
                class="flex items-center gap-4 py-3 hover:bg-gray-50 px-2 rounded">
                <img src="{{ $student->profile_picture_url }}" class="w-10 h-10 rounded-full object-cover">
                <div>
                    <p class="font-medium text-gray-800">{{ $student->full_name }}</p>
                    <p class="text-sm text-gray-500">{{ $student->student_id }} &middot; {{ $student->program }}</p>
                </div>
            </a>
        @empty
            <p class="text-gray-500">No students registered yet.</p>
        @endforelse
    </div>

    <div class="mt-6">{{ $students->links() }}</div>
</div>
@endsection