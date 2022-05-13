<nav
    class="w-screen h-[70px] z-10 flex items-center bg-white shadow-lg px-[20%] text-md font-sans fixed top-0"
>
    <div>
        <img class="w-[50px]" src="{{ asset('assets/logo.png') }}" alt="" />
    </div>
    <div class="flex justify-between items-center w-full h-full">
        <div class="h-full flex items-center mx-12">
            <div
                class="p-5 mx-1 h-full flex items-center justify-center hover:bg-gray-100 active"
            >
                <a href="/dashboard">Dashboard</a>
            </div>
            <div
                class="p-5 mx-1 h-full flex items-center justify-center hover:bg-gray-100"
            >
                <a href="/cart">Cart</a>
            </div>
            <div
                class="group p-5 mx-1 h-full flex items-center justify-center cursor-pointer relative hover:bg-gray-100"
            >
                <span>Admin</span>
                <span class="material-symbols-rounded"> expand_more </span>

                <div
                    class="admin-dropdown z-20 w-[13rem] text-md py-3 bg-white rounded-b-lg x-10 divide-y divide-gray-400 shadow hidden absolute top-[60px] group-hover:block"
                >
                    <ul class="divide-y divide-gray-400">
                        <li class="p-2 hover:bg-[#c7ccf7] hover:bg-opacity-40 hover:text-[#374151] ease-in-out duration-300 hover:text-[1.1rem]">
                            <a href="/admin/manage-games">Manage Games</a>
                        </li>
                        <li class="p-2 hover:bg-[#c7ccf7] hover:bg-opacity-40 hover:text-[#374151] ease-in-out duration-300 hover:text-[1.1rem]">
                            <a href="/admin/manage-categories">Manage Categories</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @auth
            <div
                class="group p-5 mx-1 h-full flex items-center justify-center cursor-pointer relative hover:bg-gray-100"
            >
                <span>{{auth()->user()->name}}</span>
                <span class="material-symbols-rounded"> expand_more </span>

                <div
                    class="account-dropdown z-20 w-[9rem] text-md py-3 bg-white rounded-b-lg shadow hidden absolute top-[60px] group-hover:block"
                >
                    <ul class="divide-y divide-gray-400">
                        <li class="p-2 hover:bg-[#c7ccf7] hover:bg-opacity-40 hover:text-[#374151] ease-in-out duration-300 text-red-500 hover:text-[1.1rem] hover:text-red-600">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div
                class="group w-24 mx-1 h-full flex items-center justify-center cursor-pointer relative hover:bg-gray-100"
            >
                <span>Guest</span>
                <span class="material-symbols-rounded"> expand_more </span>

                <div
                    class="account-dropdown z-10 w-[9rem] text-md px-3 py-1 bg-white rounded-b-lg x-10 divide-y divide-gray-400 shadow hidden absolute bottom-[-80px] group-hover:block"
                >
                    <ul>
                        <li class="p-2 rounded-t-lg hover:bg-gray-100 ease-in-out duration-300 hover:text-[1.1rem]">
                            <a href="/login">Login</a>
                        </li>
                        <li class="p-2 rounded-t-lg hover:bg-gray-100 ease-in-out duration-300 hover:text-[1.1rem]">
                            <a href="/register">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth
        
    </div>
</nav>
