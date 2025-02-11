@extends('Utility.generalView')
@section('title', 'Sign In')
@section('pageContent')
    <div class="grid grid-cols-1 md:grid-cols-2 items-center text-white">
        <div class="p-5 md:p-10">
            <p class="text-2xl font-medium font-montserrat">Sign in to
                Access Customer Records</p>
            <p class="text-sm font-montserrat opacity-50">Only
                authenticated users can view customer records.</p>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-8">
                    <div>
                        <div class="grid">
                            <span class="text-sm font-normal mb-1">Email
                                Address:</span>
                            <div class="relative">
                                <input type="email"
                                name="email_address"
                                 name
                                    class="w-full p-3 rounded-md bg-[#ffffff04] outline-none hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-white placeholder:text-xs dark:bg-slate-800" />
                            </div>
                        </div>
                        <span class="text-red-500 text-[13px] transition-all">error</span>
                    </div>
                    <div>
                        <div class="grid">
                            <span class="text-sm font-normal mb-1">Password</span>
                            <div class="relative">
                                <div class="absolute top-0 h-full right-0 p-1 cursor-pointer" onClick="togglePassword()">
                                    <span
                                        class="aspect-square bg-lightPrimary rounded h-full flex items-center justify-center">
                                        <img src="images/eyeIcon.svg" alt />
                                    </span>
                                </div>
                                <input type="password" id="passwordInput" placeholder name
                                    class="w-full p-3 rounded-md bg-[#ffffff04] hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-white outline-none placeholder:text-xs dark:bg-slate-800" />
                            </div>
                        </div>
                        <span class="text-red-500 text-[13px] transition-all">error</span>
                    </div>
                </div>
                <button type onClick="callToast()" class="text-sm text-white bg-secondary rounded px-8 py-3 cursor-pointer">
                    Sign in
                </button>
            </form>
            <div class="flex gap-3 text-sm mt-5">
                <img src={caution} alt class="h-5" />
                <span>Don't have an account, <span class="text-secondary"><a href="{{ route('signUp') }}">Create
                            Account</span></a></span>
            </div>
        </div>
        <div class="p-5 md:p-10">
            <img src="https://img.freepik.com/free-photo/doctor-helping-patient-signing-paperwork-medical-insurance-document-form-illness-healthcare-treatment-clinical-consultation-hospital-policy-bill-medication-prescription-close-up_482257-68537.jpg?t=st=1739190776~exp=1739194376~hmac=24ca989a19de10a4d216b13418893f20eb760e9da4d4708d3d7584d6784d1618&w=2000"
                alt class="w-full h-full object-cover mix-blend-luminosity rounded-lg" />
        </div>
    </div>
@endsection
