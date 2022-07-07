
<form class="z-50" action="{{ route('search') }}" method="GET">
    <div class="w-full px-[10%] pt-5 flex justify-center z-20 gap-3">
        <div class="w-full mx-1 mb-5 z-20 relative">
            <input  autocomplete="off" class=" w-full h-[2.5rem] border-2 border-gray-300 rounded-lg px-5 ring-[#c7ccf7] z-20 hover:ring-1 focus:outline-none focus:ring-3" type="text" name="search" id="search" placeholder="Search by game title">
            <div class="w-full h-96 mt-1 absolute flex-col z-20 hidden overflow-y-scroll" id="search-list">
            </div>
            
        </div>
        <input class="h-[2.5rem] bg-[#374151] px-5 text-white rounded-lg cursor-pointer hover:scale-105 hover:bg-[#475161] z-20" type="submit" value="Search">
        <div class="w-screen h-screen bg-black opacity-70 z-10 fixed inset-0 hidden" id="dark-screen"></div>
    </div>
</form>