<x-app-layout>
    <x-slot name="header">



    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <question-component
                    question="{{ $question->title() }}"
                    answer1="{{ $question->answer1() }}"
                    answer2="{{ $question->answer2() }}"
                    answer3="{{ $question->answer3() }}"
                    answer4="{{ $question->answer4() }}"
                    trial-id="{{ $trialId }}"
                    question-id="{{ $question->id() }}"
                >
                </question-component>



{{--                <form action="/" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">--}}


{{--                    <h1 class="mb-6 pt-6">{{ $question->title() }}</h1>--}}

{{--                    <input--}}
{{--                        type="radio"--}}
{{--                        id="1"--}}
{{--                        name="correctAnswer"--}}
{{--                        value="1"--}}
{{--                        required--}}
{{--                    >--}}
{{--                    <label for="1">{{ $question->answer1() }}</label><br>--}}

{{--                    <input--}}
{{--                        type="radio"--}}
{{--                        id="2"--}}
{{--                        name="correctAnswer"--}}
{{--                        value="2"--}}
{{--                        required--}}
{{--                    >--}}
{{--                    <label for="1">{{ $question->answer2() }}</label><br>--}}

{{--                    <input--}}
{{--                        type="radio"--}}
{{--                        id="3"--}}
{{--                        name="correctAnswer"--}}
{{--                        value="3"--}}
{{--                        required--}}
{{--                    >--}}
{{--                    <label for="1">{{ $question->answer3() }}</label><br>--}}

{{--                    <input--}}
{{--                        type="radio"--}}
{{--                        id="4"--}}
{{--                        name="correctAnswer"--}}
{{--                        value="4"--}}
{{--                        requied--}}
{{--                    >--}}
{{--                    <label for="1">{{ $question->answer4() }}</label><br>--}}




{{--                </form>--}}


            </div>
        </div>
    </div>


</x-app-layout>
