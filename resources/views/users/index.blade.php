<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <a class="underline" href="{{route('users.create')}}">Add news user</a>
                        <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 ">
                                    First Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Last Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$user->first_name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$user->last_name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$user->email}}
                                </td>
                                <td class="px-6 py-4">
                                    <a class="underline" href="{{route('users.edit',$user)}}"> Edit</a>
                                    \
                                    <form method="POST" action="{{route('users.destroy',$user)}} " class="inline-block"
                                    onsubmit="return confirm('are you sure')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="text-red-700 underline">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="mt-4"> {{ $users->links() }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

