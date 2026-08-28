@extends('layouts.app')

@section('title', 'Archive Study - Student Registration')

@section('content')

@if ($errors->any())
<div class="bg-error-container border-l-4 border-error text-on-error-container px-md py-md mb-xl flex items-start rounded shadow-sm max-w-4xl mx-auto">
<span class="material-symbols-outlined mr-sm text-error" style="font-variation-settings: 'FILL' 1;">error</span>
<div>
<p class="font-bold font-body-md text-body-md">Registration Incomplete</p>
@if ($errors->any())
<div class="bg-error-container border-l-4 border-error text-on-error-container px-md py-md mb-xl flex items-start rounded shadow-sm max-w-4xl mx-auto">
<span class="material-symbols-outlined mr-sm text-error" style="font-variation-settings: 'FILL' 1;">error</span>
<div>
<p class="font-bold font-body-md text-body-md">Registration Incomplete</p>
<ul class="font-body-md text-body-md mt-xs list-disc list-inside">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
</div>
@endif
</div>
</div>
@endif

<div class="max-w-4xl mx-auto mb-xl pl-4 md:pl-0">
<span class="inline-block font-label-sm text-label-sm uppercase tracking-widest text-primary-container bg-surface-container-low px-sm py-xs rounded mb-md border border-outline-variant/30">
    [ MP03 • Registration Module ]
</span>
<h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-sm">Student Registration</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
    Please complete the following form to formalize your enrollment for the upcoming academic session.
</p>
</div>

<div class="max-w-4xl mx-auto bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm p-xl">
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" id="registration-form">
@csrf

<section class="mb-xxl">
<h2 class="font-headline-md text-headline-md text-on-surface border-b border-outline-variant pb-sm mb-lg">01. Personal Information</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-lg">
<div>
<label class="editorial-label" for="student_id">Student ID *</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface @error('student_id') border-error @enderror"
    id="student_id" name="student_id" placeholder="e.g. 2026-00123" required type="text" value="{{ old('student_id') }}">
@error('student_id') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
<div>
<label class="editorial-label" for="first_name">First Name *</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface @error('first_name') border-error @enderror"
    id="first_name" name="first_name" placeholder="Jane" required type="text" value="{{ old('first_name') }}">
@error('first_name') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
<div>
<label class="editorial-label" for="last_name">Last Name *</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface @error('last_name') border-error @enderror"
    id="last_name" name="last_name" placeholder="Doe" required type="text" value="{{ old('last_name') }}">
@error('last_name') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-lg">
<div>
<label class="editorial-label" for="middle_name">Middle Name</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface"
    id="middle_name" name="middle_name" placeholder="Optional" type="text" value="{{ old('middle_name') }}">
</div>
<div>
<label class="editorial-label" for="date_of_birth">Date of Birth *</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface @error('date_of_birth') border-error @enderror"
    id="date_of_birth" name="date_of_birth" required type="date" value="{{ old('date_of_birth') }}">
@error('date_of_birth') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
<div>
<label class="editorial-label" for="gender">Gender *</label>
<select class="editorial-input w-full font-body-md text-body-md text-on-surface appearance-none bg-transparent @error('gender') border-error @enderror"
    id="gender" name="gender">
<option disabled value="" @selected(old('gender') === null)>Select...</option>
<option value="male" @selected(old('gender') == 'male')>Male</option>
<option value="female" @selected(old('gender') == 'female')>Female</option>
<option value="other" @selected(old('gender') == 'other')>Other</option>
</select>
@error('gender') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
</div>
</section>

<section class="mb-xxl">
<h2 class="font-headline-md text-headline-md text-on-surface border-b border-outline-variant pb-sm mb-lg">02. Academic &amp; Contact Details</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-lg mb-lg">
<div>
<label class="editorial-label" for="program">Intended Program *</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface @error('program') border-error @enderror"
    id="program" name="program" placeholder="e.g. BSIT" required type="text" value="{{ old('program') }}">
@error('program') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
<div>
<label class="editorial-label" for="year_level">Year Level *</label>
<select class="editorial-input w-full font-body-md text-body-md text-on-surface appearance-none @error('year_level') border-error @enderror"
    id="year_level" name="year_level">
<option disabled value="" @selected(old('year_level') === null)>Select Year Level...</option>
@foreach(['1st Year', '2nd Year', '3rd Year', '4th Year'] as $level)
<option value="{{ $level }}" @selected(old('year_level') == $level)>{{ $level }}</option>
@endforeach
</select>
@error('year_level') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-lg mb-lg">
<div>
<label class="editorial-label" for="email">Primary Email *</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface @error('email') border-error @enderror"
    id="email" name="email" placeholder="jane.doe@example.com" required type="email" value="{{ old('email') }}">
@error('email') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
<div>
<label class="editorial-label" for="mobile_number">Contact Number *</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface @error('mobile_number') border-error @enderror"
    id="mobile_number" name="mobile_number" placeholder="+63 900 000 0000" required type="tel" value="{{ old('mobile_number') }}">
@error('mobile_number') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
</div>

<div class="mb-lg">
<label class="editorial-label" for="address">Permanent Address *</label>
<input class="editorial-input w-full font-body-md text-body-md text-on-surface @error('address') border-error @enderror"
    id="address" name="address" placeholder="Street Address, City, Province, Postal Code" required type="text" value="{{ old('address') }}">
@error('address') <p class="text-error text-xs mt-xs">{{ $message }}</p> @enderror
</div>
</section>

<section class="mb-xl">
<h2 class="font-headline-md text-headline-md text-on-surface border-b border-outline-variant pb-sm mb-lg">03. Identification Media</h2>
<p class="font-body-md text-body-md text-on-surface-variant mb-md">
    Upload a recent, clear, head-and-shoulders photograph for your institutional ID.
</p>
<div class="border border-dashed {{ $errors->has('profile_picture') ? 'border-error' : 'border-outline-variant' }} bg-surface-container-low rounded-lg p-xl flex flex-col items-center justify-center text-center hover:bg-surface-container transition-colors cursor-pointer group"
    onclick="document.getElementById('file-upload').click();">
<div class="w-16 h-16 rounded-full bg-surface-container-highest flex items-center justify-center mb-md group-hover:bg-primary-container group-hover:text-on-primary transition-colors">
<span class="material-symbols-outlined text-secondary group-hover:text-on-primary" style="font-size: 32px;">cloud_upload</span>
</div>
<p class="font-body-md text-body-md text-on-surface mb-sm" id="file-upload-label">Click to select your profile picture</p>
<div class="inline-flex items-center bg-surface-variant/50 px-sm py-xs rounded text-primary font-label-sm text-label-sm uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px] mr-xs">image</span>
    [ JPG, PNG • Max 2MB ]
</div>
<input accept=".jpg,.jpeg,.png" class="hidden" id="file-upload" name="profile_picture" type="file"
    onchange="document.getElementById('file-upload-label').textContent = this.files[0]?.name ?? 'Click to select your profile picture';">
</div>
@error('profile_picture') <p class="text-error text-xs mt-sm">{{ $message }}</p> @enderror
</section>

<div class="mt-xxl pt-lg border-t border-outline-variant flex flex-col sm:flex-row justify-between items-center gap-md">
<button class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest hover:text-primary transition-colors underline-offset-4 hover:underline" type="reset">
    Reset Form
</button>
<button class="w-full sm:w-auto bg-primary-container text-on-primary font-label-sm text-label-sm uppercase tracking-widest px-xl py-md rounded hover:bg-surface-tint transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-primary-container" type="submit">
    Complete Registration
</button>
</div>
</form>
</div>
@endsection