

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form class="m-3" method="POST" action="{{ route('clients.store') }}">
                    @csrf
                    <!-- contact Name -->
                    <div>
                        <x-input-label for="" :value="__('Contact Name')" />
                        <x-text-input id="" class="block mt-1 w-full" type="text" name="contact_name" required autofocus autocomplete="contact_name" />
                        <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                    </div>

                    <!-- contact_email -->
                    <div>
                        <x-input-label for="" :value="__('contact email')" />
                        <x-text-input id="" class="block mt-1 w-full" type="email" name="contact_email" required autofocus autocomplete="contact_email" />
                        <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                    </div>

                    <!-- contact phone -->
                    <div>
                        <x-input-label for="contact_phone" :value="__('contact phone')" />
                        <x-text-input id="" class="block mt-1 w-full" type="text" name="contact_phone" required autofocus autocomplete="contact_phone" />
                        <x-input-error :messages="$errors->get('contact_phone')" class="mt-2" />
                    </div>

                    <div class="text-xl font-semibold mb-3 mt-3">Company Information</div>
                    <!-- company Name -->
                    <div>
                        <x-input-label for="" :value="__('Company Name')" />
                        <x-text-input id="" class="block mt-1 w-full" type="text" name="company_name" required autofocus autocomplete="company_name" />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>

                    {{-- company address  --}}
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('company address')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="company_address"  required autofocus autocomplete="company_address" />
                        <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                    </div>

                    <!-- company_city -->
                    <div class="mt-4">
                        <x-input-label for="" :value="__('company city')" />
                        <x-text-input id="" class="block mt-1 w-full" type="text" name="company_city" required autocomplete="company_city" />
                        <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                    </div>

                    <!-- company_zip -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('company zip')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="number" name="company_zip"  required autofocus autocomplete="company_zip" />
                        <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                    </div>

                    <!-- company_vat -->
                    <div class="mt-4">
                        <x-input-label for="company_vat" :value="__('company vat')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="number" name="company_vat"  required autofocus autocomplete="company_zip" />
                        <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

