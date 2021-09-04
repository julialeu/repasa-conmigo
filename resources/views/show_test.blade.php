<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $test->title() }}
        </h1>

        <h3 class="font-semibold text-l text-gray-800 leading-tight">
            {{ $test->description() }}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight my-4 ml-6">Añade una nueva pregunta</h2>
                <form  action="/create-question" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Título
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="title" name="title" type="text" placeholder="Título" value="Mi super test" required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="question">
                            Pregunta
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="question" name="question" type="text" placeholder="Pregunta"
                            value="Pregunta" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="answer1">
                            Respuesta 1
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="answer1" name="answer1" type="text" placeholder="Respuesta 1"
                            value="Respuesta 1" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="answer2">
                            Respuesta 2
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="answer2" name="answer2" type="text" placeholder="Respuesta 2"
                            value="Respuesta 2" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="answer3">
                            Respuesta 3
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="answer3" name="answer3" type="text" placeholder="Respuesta 3"
                            value="Respuesta 3" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="answer4">
                            Respuesta 4
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="answer4" name="answer4" type="text" placeholder="Respuesta 4"
                            value="Respuesta 4" required>
                    </div>

                    <h1 class="mb-6 pt-6">Selecciona la respuesta correcta:</h1>
                    <input type="radio" id="1" name="correctAnswer" value="1" required>
                    <label for="1">1</label><br>
                    <input type="radio" id="2" name="correctAnswer" value="2" required>
                    <label for="2">2</label><br>
                    <input type="radio" id="3" name="correctAnswer" value="3" required>
                    <label for="3">3</label><br>
                    <input type="radio" id="4" name="correctAnswer" value="4" required>
                    <label for="4">4</label>

                    <input type="hidden" value="{{ $test->id() }}" name="testId" >

                    <div class="flex items-center justify-between mt-6">

                        <input
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            value="Añadir pregunta"
                            type="submit" value="Submit">

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
