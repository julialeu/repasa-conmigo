<x-app-layout>
    <x-slot name="header">



    </x-slot>

    <style>

    </style>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">




                <form action="/create-question" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf


                    <h1 class="mb-6 pt-6">{{ $question->title() }}:</h1>
                    <input type="radio" id="1" name="correctAnswer" value="1" required>
                    <label for="1">{{ $question->answer1() }}</label><br>
                    <input type="radio" id="2" name="correctAnswer" value="2" required>
                    <label for="2">{{ $question->answer2() }}</label><br>
                    <input type="radio" id="3" name="correctAnswer" value="3" required>
                    <label for="3">{{ $question->answer3() }}</label><br>
                    <input type="radio" id="4" name="correctAnswer" value="4" required>
                    <label for="4">{{ $question->answer4() }}</label>


                </form>

            </div>
        </div>
    </div>


</x-app-layout>