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
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        @click="sendAnswer"
                    >
                        Responder
                    </button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'trialId',
        'questionId'
    ],
    data: () => {
        return {
            selected: ""
        }
    },
    methods: {
        optionSelected: function () {
            alert('ha hecho click! selected: ' + this.selected);
        },
        sendAnswer: function () {
            console.log('enviar222')

            let data = {
                userAnswer: parseInt(this.selected)
            };
            let url = '/api/answer/' + this.trialId + '/' + this.questionId
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            console.log('csrfToken', csrfToken);
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
                .then(function (response) {
                    event.preventDefault()

                    // alert('bieeeen')
                    // if(response.ok) {
                    //     return response.text()
                    // } else {
                    //     throw "Error en la llamada Ajax";
                    // }

                })
                .catch(function (err) {
                    console.log('Error', err);
                });
        }
    }

}
</script>
