@extends('Utility.generalView')
@section('title', 'Sign Up')
@section('pageContent')
    <div class="flex items-center text-white justify-center lg:h-screen lg:-mt-10">
        <div class="rounded lg:border-1 lg:border-[#C4C4C4]/32 lg:w-2/5 w-full">
            <div class="p-4 border-b border-[#C4C4C4]/32 flex justify-between ">
                <span class="text-xl">Registration Form</span>
                <a href="/"><span class="opacity-80 text-secondary">Sign
                        In</span></a>
            </div>
            <form class="p-4 grid gap-4" method="post" action={{ '/create-account' }}>
                @csrf
                <div>
                    <div class="grid">
                        <span class="text-sm font-normal mb-1 inline-flex items-start">
                            Full Name
                            <code class="text-[10px] text-red-500 align-top">*</code>
                        </span>
                        <div class="relative">
                            <input type="text" name ="full_name" value="{{ old('full_name') }}"
                                class="w-full p-3 rounded-md bg-[#ffffff04] outline-none hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-white placeholder:text-xs dark:bg-slate-800" />
                        </div>
                    </div>
                    @error('full_name')
                        <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="grid">
                        <span class="text-sm font-normal mb-1 inline-flex items-start">
                            Phone Number
                            <code class="text-[10px] text-red-500 align-top">*</code>
                        </span>
                        <div class="relative">
                            <input type="number" name="phone_number" value="{{ old('phone_number') }}"
                                class="w-full p-3 rounded-md bg-[#ffffff04] hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-white outline-none placeholder:text-xs dark:bg-slate-800
                           [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none" />
                        </div>
                    </div>
                    @error('phone_number')
                        <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="grid">
                        <span class="text-sm font-normal mb-1 inline-flex items-start">
                            Email Address
                            <code class="text-[10px] text-red-500 align-top">*</code>
                        </span>
                        <div class="relative">
                            <input type="email" placeholder name="email_address" value="{{ old('email_address') }}"
                                class="w-full p-3 rounded-md bg-[#ffffff04] outline-none hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-white placeholder:text-xs dark:bg-slate-800" />
                        </div>
                    </div>
                    @error('email_address')
                        <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="grid">
                        <span class="text-sm font-normal mb-1 inline-flex items-start">
                            Password
                            <code class="text-[10px] text-red-500 align-top">*</code>
                        </span>
                        <div class="relative">
                            <div class="absolute top-0 h-full right-0 p-1 cursor-pointer" onClick="togglePassword()">
                                <span class="aspect-square bg-lightPrimary rounded h-full flex items-center justify-center">
                                    <img src="{{ asset('assets/images/eyeIcon.svg') }}" alt />
                                </span>
                            </div>
                            <input type="password" id="passwordInput" placeholder name="password"
                                value="{{ old('password') }}"
                                class="w-full p-3 rounded-md bg-[#ffffff04] hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-white outline-none placeholder:text-xs dark:bg-slate-800" />
                        </div>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="text-sm text-white bg-secondary rounded px-8 py-3 cursor-pointer">
                    Create Account
                </button>
        </div>
        </form>
    </div>
    </div>
@endsection
@extends('Utility.functions')
