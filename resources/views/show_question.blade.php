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
                    :trial-id="{{ $trialId }}"
                    :question-id="{{ $question->id() }}"
                >
                </question-component>

            </div>
        </div>
    </div>


</x-app-layout>
