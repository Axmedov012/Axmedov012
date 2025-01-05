<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <a class="underline" href="{{route('clients.create')}}">Add news client</a>
                        <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 ">
                                    Company Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Vat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            @foreach($clients as $client)
                                <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$client->company_name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$client->company_address}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$client->company_vat}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="underline" href="{{route('clients.edit',$client)}}"> Edit</a>
                                        \
                                        @can(\App\Enums\PermissionEnum::DELETE_CLIENTS->value)
                                        <form method="POST" action="{{route('clients.destroy',$client)}} " class="inline-block"
                                              onsubmit="return confirm('are you sure')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="text-red-700 underline">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class="mt-4"> {{ $clients->links() }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


