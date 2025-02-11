@extends('Utility.generalView')
@section('title', 'Dashboard')
@section('pageContent')
    <div
        class="w-full pt-4 pb-10 flex flex-col lg:flex-row gap-4 px-5">
        <div class="w-full lg:w-2/3">
            <div class="border border-[#C4C4C4]/32 rounded">
                <p
                    class="px-4 pt-4 pb-2 border-b border-[#C4C4C4]/32 uppercase">OTHER
                    customer
                    RECORD</p>
                <div class="p-4">
                    <div class=" grid">
                        <div
                            class="overflow-x-auto border border-lightPrimary rounded-md">
                            <table
                                class="w-full text-sm text-left bg-primary">
                                <thead
                                    class=" border-b border-lightPrimary">
                                <tr>
                                    <th scope="col"
                                        class="p-6 whitespace-nowrap">
                                        SN
                                    </th>
                                    <th scope="col"
                                        class="p-6 whitespace-nowrap">
                                        Full Name
                                    </th>
                                    <th scope="col"
                                        class="p-6 whitespace-nowrap">
                                        Email Address
                                    </th>
                                    <th scope="col"
                                        class="p-6 whitespace-nowrap">
                                        Phone Number
                                    </th>
                                    <th scope="col"
                                        class="p-6 whitespace-nowrap">
                                        Created At
                                    </th>
                                    <th scope="col"
                                        class="p-6 whitespace-nowrap">
                                        Action
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr
                                    key={index}
                                    class="hover:bg-[#ffffff10] cursor-pointer">
                                    <td
                                        class="text-start py-5 ps-6">1</td>
                                    <td
                                        class="text-start py-5 ps-6">
                                        Nurudeen Faniyi
                                    </td>
                                    <td
                                        class="text-start py-5 ps-6">
                                        nurudeen@example.com
                                    </td>
                                    <td
                                        class="text-start py-5 ps-6">0383839393</td>
                                    <td
                                        class="text-start py-5 ps-6">
                                        Jan 20, 2025
                                    </td>
                                    <td
                                        class="text-start py-5 ps-6 flex gap-4">
                                        <button
                                            class="text-sm text-white bg-secondary rounded p-3 cursor-pointer">
                                            <img src ="{{ asset('assets/images/pencil.svg') }}"/>
                                        </button>
                                        <button
                                            class="text-sm text-white bg-red-500 rounded p-3 cursor-pointer">
                                            <img src ="{{ asset('assets/images/bin.svg') }}"/>
                                        </button>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="w-full lg:w-1/3">
            <div class="border border-[#C4C4C4]/32 rounded">
                <p
                    class="px-4 pt-4 pb-2 border-b border-[#C4C4C4]/32 uppercase">Profile
                    Details</p>
                <div class="p-4 grid gap-y-5">
                    <div class=" grid">
                        <p class="opacity-60">FullName:</p>
                        <p class="font-montserrat">{{ session('user.full_name')}}</p>
                    </div>
                    <div class=" grid">
                        <p class="opacity-60">Phone Number:</p>
                        <p class="font-montserrat">{{session('user.phone_number')}}</p>
                    </div>
                    <div class=" grid">
                        <p class="opacity-60">Email Address:</p>
                        <p
                            class="font-montserrat">{{session('user.email_address')}}</p>
                    </div>
                    <div class=" grid">
                        <p class="opacity-60">CV</p>
                        <p class="font-montserrat text-sm">
                            @if(session('user.cv') == "")
                                No file available
                                <span class="cursor-pointer bg-secondary rounded px-3 py-2" onClick>Upload CV</span>
                        @else
                            {{ session('user.cv') }}
                            @endif
                            </p>
                    </div>
                    <button class="bg-secondary rounded py-3 cursor-pointer"
                            onClick="toggleProfileModal()">Update
                        Record</button>
                </div>
            </div>
        </div>
    </div>
@endsection
