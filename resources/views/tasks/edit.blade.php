


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form class="m-3" method="POST" action="{{ route('tasks.update',$task) }}">
                    @method('PUT')
                    @csrf
                    <!-- title -->
                    <div>
                        <x-input-label for="" :value="__('Title')" />
                        <x-text-input id="" class="block mt-1 w-full" type="text" name="title" :value=" $task->title " required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="" class="block mt-1 w-full" type="text" name="description" :value="$task->description" required autofocus autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Deadline -->
                    <div>
                        <x-input-label for="" :value="__('Deadline')" />
                        <x-text-input id="" class="block mt-1 w-full" type="date" name="deadline_at" :value="$task->deadline_at" required autofocus autocomplete="deadline_at" />
                        <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                    </div>

                    {{-- Assign User  --}}
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Assign User')" />
                        <select name="user_id" id="" class="block mt-1 w-full border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-b">
                            @foreach($users as $user)
                                <option value="{{$user->id}}"
                                    @selected(old('user_id') == $task->user->id)> {{$task->user->first_name .''.$task->user->last_name}}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>

                    {{-- Assign Client  --}}
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Assign Client')" />
                        <select name="client_id" id="" class="block mt-1 w-full border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-b">
                            @foreach($clients as $client)
                                <option value="{{$client->id}}"
                                    @selected(old('client_id') == $task->client->id)> {{$task->client->company_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                    </div>

                    {{-- Assign Project  --}}
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Assign Project')" />
                        <select name="project_id" id="" class="block mt-1 w-full border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-b">
                            @foreach($projects as $project)
                                <option value="{{$project->id}}"
                                    @selected(old('project_id') == $task->project->id)> {{$task->project->title }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                    </div>

                    {{-- Status  --}}
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Status')" />
                        <select name="status" id="" class="block mt-1 w-full border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-b">
                            @foreach(\App\Enums\TaskStatus::cases() as $status)
                                <option value="{{$status->value}}"
                                    @selected(old('status') == $task->status->value)> {{$status->value}}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>




