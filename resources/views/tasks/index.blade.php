
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <a class="underline" href="{{route('tasks.create')}}">Add news task</a>
                        <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 ">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Assing To
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Client
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deadline
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            @foreach($tasks as $task)
                                <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$task->title}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$task->user->first_name}} {{$task->user->last_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$task->client->company_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$task->deadline_at}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$task->status}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="underline" href="{{route('tasks.edit',$task)}}"> Edit</a>
                                        \
                                        @can(\App\Enums\PermissionEnum::DELETE_TASKS->value)
                                        <form method="POST" action="{{route('tasks.destroy',$task)}} " class="inline-block"
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
                        <div class="mt-4"> {{ $tasks->links() }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




