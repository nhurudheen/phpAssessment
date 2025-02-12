@extends('Utility.generalView')
@section('title', 'Dashboard')
@section('logOutButton', true)
@section('pageContent')
    <div
        class="w-full pt-4 pb-10 flex flex-col lg:flex-row gap-4 px-5">
        <div class="w-full lg:w-2/3">
            <div class="border border-[#C4C4C4]/32 rounded">
                <p
                    class="px-4 pt-4 pb-2 border-b border-[#C4C4C4]/32 uppercase">ALL
                    customer
                    RECORD</p>
                <div class="py-4">
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
                                @foreach($employeeList as $data)
                                <tr
                                    key={index}
                                    class="hover:bg-[#ffffff10] cursor-pointer">
                                    <td
                                        class="text-start py-5 ps-6">{{ $loop->iteration }}</td>
                                    <td
                                        class="text-start py-5 ps-6">
                                        {{$data->full_name}}
                                    </td>
                                    <td
                                        class="text-start py-5 ps-6">
                                        {{$data->email_address}}
                                    </td>
                                    <td
                                        class="text-start py-5 ps-6">{{ $data->phone_number }}</td>
                                    <td
                                        class="text-start py-5 ps-6">
                                        {{ date_format($data->created_at, 'M d, Y H:i:s')}}
                                    </td>
                                    <td
                                        class="text-start py-5 ps-6 flex gap-2">

                                        <button
                                            class="text-sm text-white bg-secondary rounded p-3 cursor-pointer" onclick="toggleUpdateRecordModal( '{{ $data->id }}')">
                                            <img src ="{{ asset('assets/images/pencil.svg') }}"/>
                                        </button>
                                        <button
                                            class="text-sm text-white bg-red-500 rounded p-3 cursor-pointer mr-2" onclick="toggleDeleteModal( '{{ $data->id }}')">
                                            <img src ="{{ asset('assets/images/bin.svg') }}"/>
                                        </button>
                                        @if(!empty($data->cv))
                                            <a href="{{asset($data->cv)}}" target="_blank">
                                                <button
                                                    class="text-sm text-white bg-secondary/50 rounded p-3 cursor-pointer">
                                                    <img src ="{{ asset('assets/images/file.svg') }}"/>
                                                </button></a>
                                        @endif
                                    </td>
                                @include('Modals.UpdateRecordModal')
                                    @include('Modals.DeleteEmployeeModal')
                                </tr>
                                @endforeach
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
                        <p class="font-montserrat">{{ $personalRecord->full_name}}</p>
                    </div>
                    <div class=" grid">
                        <p class="opacity-60">Phone Number:</p>
                        <p class="font-montserrat">{{$personalRecord->phone_number}}</p>
                    </div>
                    <div class=" grid">
                        <p class="opacity-60">Email Address:</p>
                        <p
                            class="font-montserrat">{{$personalRecord->email_address}}</p>
                    </div>
                    <div class=" grid">
                        <p class="opacity-60">CV</p>
                        <div class="font-montserrat text-sm flex justify-between items-center gap-x-2 truncate">
                                @if(empty($personalRecord->cv))
                                    No file available
                                @else
                                    <p class="truncate">{{ basename($personalRecord->cv) }}</p>
                                <a href="{{asset($personalRecord->cv)}}" target="_blank"> <button class="px-3 py-2 bg-secondary/60 text-white rounded cursor-pointer">View</button></a>
                                @endif
                            </div>
                    </div>
                    <button class="bg-secondary rounded py-3 cursor-pointer"
                            onClick="toggleProfileModal()">Update
                        Record</button>
                </div>
            </div>
        </div>
    </div>
    @include('Modals.ProfileRecordModal')
    @include('Utility.functions')
@endsection
