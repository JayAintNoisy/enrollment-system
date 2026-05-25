@extends('layouts.guest')

@section('title', 'Enter Passcode')

@section('content')
    <h1 class="page-title">Private System Access</h1>
    <p class="page-subtitle">Enter the assigned system passcode to continue to the admin dashboard.</p>

    <form method="POST" action="{{ route('access.submit') }}">
        @csrf

        <label for="passcode">Assigned passcode</label>
        <input id="passcode" class="form-field" type="password" name="passcode" value="{{ old('passcode') }}" placeholder="Enter assigned code" required autofocus>
        @error('passcode')
            <div class="alert">{{ $message }}</div>
        @enderror

        <button class="btn" type="submit">Continue</button>
    </form>

    <div class="link-row">
        <span>If you do not have the code, ask school staff for the assigned classroom passcode.</span>
    </div>
@endsection
