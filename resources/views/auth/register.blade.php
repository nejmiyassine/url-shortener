@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-[86vh]">
        <div class="max-w-md w-full p-6 bg-white rounded-md shadow-md">

            <div class="text-2xl font-bold text-gray-900 mb-4">{{ __('Register') }}</div>

            <form method="POST" action="{{ route('user.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-900">{{ __('Name') }}</label>
                    <div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autocomplete="name" autofocus
                            class="block w-full p-2 border-2 rounded-md focus:outline-none focus:border-indigo-600 @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">{{ __('Email Address') }}</label>
                    <div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="email"
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
                    <div>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="block w-full p-2 border-2 rounded-md focus:outline-none focus:border-indigo-600 @error('password') border-red-500 @enderror">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password-confirm"
                        class="block text-sm font-medium text-gray-900">{{ __('Confirm Password') }}</label>
                    <div>
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            class="block w-full p-2 border-2 rounded-md focus:outline-none focus:border-indigo-600">
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror

                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="p-3 rounded-md bg-blue-500 text-white font-semibold hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
