@extends('layouts.app')

@section('title', 'Student Profile Preview')

@section('content')
<div class="flex flex-col items-center">

@if (session('success'))
<div class="w-full max-w-3xl bg-primary-container text-on-primary-container px-lg py-md rounded-lg flex items-center gap-md mb-xl" role="alert">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-body-md text-body-md font-medium">{{ session('success') }}</span>
</div>
@endif

<div class="w-full max-w-3xl bg-surface-container-lowest border border-outline-variant rounded-xl flex flex-col md:flex-row overflow-hidden">

<div class="w-full md:w-[320px] p-xl border-b md:border-b-0 md:border-r border-outline-variant flex flex-col items-center justify-center bg-surface-container-low text-center relative">
<div class="w-32 h-32 rounded-xl overflow-hidden mb-lg border border-outline-variant relative">
<img class="w-full h-full object-cover" src="{{ $student->profile_picture_url }}" alt="{{ $student->full_name }}">
</div>
<div class="inline-flex items-center gap-xs bg-surface-container-highest px-sm py-xs rounded-full mb-md">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">Active Status</span>
</div>
<div class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-xs">Student ID</div>
<div class="font-headline-md text-headline-md text-on-surface tracking-tight">{{ $student->student_id }}</div>
</div>

<div class="w-full p-xl">
<h2 class="font-headline-lg-mobile md:font-headline-md text-headline-lg-mobile md:text-headline-md text-on-surface mb-lg">Profile Overview</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-y-xl gap-x-gutter">

<div class="flex flex-col gap-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Legal Name</span>
<span class="font-body-lg text-body-lg text-on-surface">{{ $student->full_name }}</span>
</div>

<div class="flex flex-col gap-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Institutional Email</span>
<span class="font-body-lg text-body-lg text-on-surface break-words">{{ $student->email }}</span>
</div>

<div class="flex flex-col gap-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Mobile Contact</span>
<span class="font-body-lg text-body-lg text-on-surface">{{ $student->mobile_number }}</span>
</div>

<div class="flex flex-col gap-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Academic Program</span>
<span class="font-body-lg text-body-lg text-on-surface">{{ $student->program }}</span>
</div>

<div class="flex flex-col gap-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Year Level</span>
<span class="font-body-lg text-body-lg text-on-surface">{{ $student->year_level }}</span>
</div>

<div class="flex flex-col gap-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Date of Birth</span>
<span class="font-body-lg text-body-lg text-on-surface">{{ $student->date_of_birth->format('d F Y') }}</span>
</div>

<div class="flex flex-col gap-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Gender</span>
<span class="font-body-lg text-body-lg text-on-surface capitalize">{{ $student->gender }}</span>
</div>

<div class="flex flex-col gap-xs sm:col-span-2 border-t border-outline-variant pt-md mt-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Registered Address</span>
<span class="font-body-md text-body-md text-on-surface leading-relaxed">{{ $student->address }}</span>
</div>

</div>
</div>
</div>

<div class="w-full max-w-3xl mt-xl flex justify-start">
<a href="{{ route('students.create') }}" class="inline-flex items-center gap-sm px-lg py-md border border-outline-variant rounded-full font-body-md text-body-md text-on-surface hover:bg-surface-variant transition-colors duration-300">
<span class="material-symbols-outlined text-[18px]">arrow_left_alt</span>
    Register another student
</a>
</div>

</div>
@endsection