<div id="profileRecordModal"
     class="hidden w-full left-0 z-50 fixed h-screen bg-black/70 top-0 px-4 flex items-end md:items-center justify-center">
    <div
        class="bg-black rounded w-full md:w-[30%] text-white max-h-[80%] mb-4 md:mb-0 overflow-auto">
        <div
            class="flex justify-between items-center text-sm px-6 py-4 border-b dark:border-b-[#c4c4c432]">
            <span class="text-lg ">Update Profile Record</span>
            <img
                src="{{ asset('assets/images/clsoe.svg') }}"
                onClick="toggleProfileModal()"
                class="h-5 cursor-pointer"
                alt />
        </div>
        <form method="post" action={{ '/update-record' }} enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{session('user.id')}}" name="id" hidden>
        <div class="grid text-xs px-4 pb-4 pt-2 gap-3">
            <div>
                <div class="grid">
                            <span
                                class="text-sm font-normal mb-1">FullName:</span>
                    <input type="text" name="full_name" value="{{ $personalRecord->full_name }}"
                           class="w-full p-3 rounded-md bg-[#ffffff04] outline-none hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-secondary placeholder:text-xs dark:bg-slate-800" />

                </div>
                @error('full_name')
                <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <div class="grid">
                            <span
                                class="text-sm font-normal mb-1">Email
                                Address:</span>
                    <input type="email"  name="email_address" value="{{ $personalRecord->email_address }}"
                           class="w-full p-3 rounded-md bg-[#ffffff04] outline-none hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-secondary placeholder:text-xs dark:bg-slate-800" />

                </div>
                @error('email_address')
                <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid">
                        <span
                            class="text-sm font-normal mb-1">Phone
                            Number:</span>
                <div class="relative">
                    <input
                        type="number" name="phone_number" value="{{ $personalRecord->phone_number }}"
                        class="w-full p-3 rounded-md bg-[#ffffff04] hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-secondary outline-none placeholder:text-xs dark:bg-slate-800
                                   [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"/>
                </div>

                @error('phone_number')
                <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
                @enderror
            </div>
        <div>
            <div class="grid">
                        <span class="text-sm font-normal mb-1 inline-flex items-start">
                            Change CV
                        </span>
                <div class="relative">
                    <input type="file" name ="cv" value="{{ session('user.cv') }}"
                           class="w-full p-3 rounded-md bg-[#ffffff04] outline-none hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-white placeholder:text-xs dark:bg-slate-800" />
                </div>
            </div>
            @error('cv')
            <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <div class="grid">
                            <span
                                class="text-sm font-normal mb-1">New Password</span>
                <div class="relative">
                    <div
                        class="absolute top-0 h-full right-0 p-1 cursor-pointer"
                        onClick="togglePasswordInput('{{ $personalRecord->id }}_xyz')">
                                    <span
                                        class="aspect-square bg-lightPrimary rounded h-full flex items-center justify-center">
                                        <img src="{{ asset('assets/images/eyeIcon.svg') }}"
                                             alt />
                                    </span>
                    </div>
                    <input type="password"
                           id="passwordInput_{{ $personalRecord->id.'_xyz' }}" name="password"
                           class="w-full p-3 rounded-md bg-[#ffffff04] hover:bg-[#ffffff08] border border-lightPrimary active:border-none focus:border-secondary outline-none placeholder:text-xs dark:bg-slate-800" />
                </div>
            </div>
            @error('password')
            <span class="text-red-500 text-[13px] transition-all">{{ $message }}</span>
            @enderror
        </div>
        <button class="bg-secondary rounded py-3 text-white">Update
            Record</button>
        </form>
    </div>
</div>
</div>
