@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-[86vh]">
        <div class="w-full max-w-md p-6 bg-white rounded-md shadow-md">

            <div class="text-2xl font-bold text-gray-900 mb-4">{{ __('Login') }}</div>

            @if (session()->has('error'))
                <div class="p-2 bg-red-500 text-white font-semibold rounded-md mb-4">
                    {{ session()->get('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('user.login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">{{ __('Email Address') }}</label>
                    <div class="mt-1">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus
                            class="block w-full p-2 border-2 rounded-md focus:outline-none focus:border-indigo-600 @error('email') border-red-500 @enderror">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">{{ __('Password') }}</label>
                    <div class="mt-1">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full p-2 border-2 rounded-md focus:outline-none focus:border-indigo-600
                                    @error('password') border-red-500 @enderror">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="p-3 rounded-md text-white font-semibold bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
