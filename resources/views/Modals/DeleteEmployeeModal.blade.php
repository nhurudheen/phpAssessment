<div id="deleteRecordModal_{{ $data->id }}"
     class="hidden w-full left-0 z-50 fixed h-screen bg-black/70 top-0 px-4 flex items-end md:items-center justify-center">
    <div
        class="bg-black rounded w-full md:w-[30%] text-white max-h-[80%] mb-4 md:mb-0 overflow-auto">
        <div
            class="flex justify-between items-center text-sm px-6 py-4 border-b dark:border-b-[#c4c4c432]">
            <span class="text-lg ">Delete Record</span>
            <img
                src="{{ asset('assets/images/clsoe.svg') }}"
                onClick="toggleDeleteModal(('{{ $data->id }}'))"
                class="h-5 cursor-pointer"
                alt />
        </div>
        <div class="p-6">
            <p class="text-sm font-medium">Are you sure you want to delete record</p>
            <div class="flex justify-between py-6">
                <button class="bg-secondary text-white px-8 py-2 rounded cursor-pointer" onClick="toggleDeleteModal(('{{ $data->id }}'))">NO</button>
                <a href="{{ route('deleteRecord', ['id' => $data->id]) }}"><button class="bg-red-500 text-white px-8 py-2 rounded cursor-pointer">YES</button></a>
            </div>
        </div>
    </div>
</div>
</div>
