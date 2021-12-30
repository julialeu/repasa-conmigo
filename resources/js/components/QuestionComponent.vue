<template>
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">


                <form action="/" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">


                    <h1 class="mb-6 pt-6">{{ question }}</h1>

                    <input
                        type="radio"
                        id="1"
                        name="correctAnswer"
                        value="1"
                        required
                        v-model="selected"
                    >
                    <label for="1">{{ answer1 }}</label><br>

                    <input
                        type="radio"
                        id="2"
                        name="correctAnswer"
                        value="2"
                        required
                        v-model="selected"
                    >
                    <label for="1">{{ answer2 }}</label><br>

                    <input
                        type="radio"
                        id="3"
                        name="correctAnswer"
                        value="3"
                        required
                        v-model="selected"
                    >
                    <label for="1">{{ answer3 }}</label><br>

                    <input
                        type="radio"
                        id="4"
                        name="correctAnswer"
                        value="4"
                        required
                        v-model="selected"
                    >
                    <label for="1">{{ answer4 }}</label><br>


                    <button
                        v-if="isSendAnswerVisible"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        @click="sendAnswer"
                    >
                        Responder
                    </button>

                    <div
                        v-if="isSuccessLabelVisible"
                    >
                        <span class="correct-answer">Respuesta correcta!</span>
                    </div>

                    <div
                        v-if="isFailureLabelVisible"
                    >
                        <span class="incorrect-answer">Respuesta incorrecta! La correcta era la número {{
                                correctAnswer
                            }}</span>
                    </div>

                    <div
                        v-if="isNextQuestionButtonVisible"
                    >
                        <br>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            @click="goToNextQuestion"
                        >
                            Siguiente
                        </button>
                    </div>

                    <div
                        v-if="isResultVisible"
                        class="result-box"
                    >
                        <br>
                        <span>Has terminado el test!</span>
                        <br>
                        <br>
                        <span>{{ numCorrectAnswers }} preguntas acertadas</span>
                        <br>
                        <span>{{ numFailedAnswers }} preguntas falladas</span>
                        <br>
                        <span>{{ percentSuccess }} % de acierto</span>

                    </div>

                </form>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        question: {
            type: [String],
            required: true
        },
        answer1: {
            type: [String],
            required: true
        },
        answer2: {
            type: [String],
            required: true
        },
        answer3: {
            type: [String],
            required: true
        },
        answer4: {
            type: [String],
            required: true
        },
        trialId: {
            type: [Number],
            required: true
        },
        questionId: {
            type: [Number],
            required: true
        },
    },
    data: () => {
        return {
            selected: "",
            isSendAnswerVisible: true,
            isSuccessLabelVisible: false,
            isFailureLabelVisible: false,
            correctAnswer: null,
            isNextQuestionButtonVisible: false,
            nextQuestion: null,
            isResultVisible: false,
            numCorrectAnswers: null,
            numFailedAnswers: null,
            percentSuccess: null,
        }
    },
    methods: {
        optionSelected: function () {
            alert('ha hecho click! selected: ' + this.selected);
        },
        sendAnswer: function () {
            this.isSendAnswerVisible = false

            let data = {
                userAnswer: parseInt(this.selected)
            };
            let url = '/api/answer/' + this.trialId + '/' + this.questionId
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            event.preventDefault()

            fetch(url, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                },
                redirect: 'manual'
            })
                .then(response => response.json())
                .then(responseData => {
                        const isCorrectAnswer = responseData.isCorrectAnswer;
                        if (isCorrectAnswer) {
                            this.isSuccessLabelVisible = true;
                        } else {
                            this.isFailureLabelVisible = true;
                            this.correctAnswer = responseData.correctAnswer
                        }

                        this.nextQuestion = responseData.nextQuestionId

                        if (responseData.nextQuestionId === null) {
                            // hemos terminado el test
                            this.numCorrectAnswers = responseData.numCorrectAnswers
                            this.numFailedAnswers = responseData.numFailedAnswers
                            const numQuestions = responseData.numCorrectAnswers + responseData.numFailedAnswers
                            this.percentSuccess = (responseData.numCorrectAnswers * 100) / numQuestions;

                            this.isResultVisible = true

                        } else {
                            this.isNextQuestionButtonVisible = true
                        }
                    }
                )
                .catch(function (err) {
                    console.log('Error', err);
                });
        },
        goToNextQuestion: function () {
            event.preventDefault()

            const targetUrl = '/trial/' + this.trialId + '/' + this.nextQuestion
            console.log('targetUrl is:', targetUrl)
            window.location.href = targetUrl

        }
    }

}
</script>

<style>
.correct-answer {
    color: green;
}

.incorrect-answer {
    color: red;
}
</style>
