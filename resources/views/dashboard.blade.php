<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($tests as $test)

                            <a href="/test/{{ $test->id() }}">{{ $test->title() }}</a>
                            <a href="/take-test/{{ $test->id() }}" class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">Realizar test</a>
                        <br>

                    @endforeach
                    <br>

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="/crear-test">Crear test</a>
                    </button>
                </div>

                <br>
                <br>



                <br>
                <br>
            </div>
        </div>
    </div>
</x-app-layout>
