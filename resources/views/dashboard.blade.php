<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <br>
@can('delete-post')

@role('admin')
    You are admin.
    <br>
    <a href="" class="btn btn-primary ">Admin </a>
@endrole
@endcan
                    @role('user')
                    you are login as user hai
                    @endrole

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
