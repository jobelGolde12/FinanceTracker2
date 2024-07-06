<template>
    <div>
        <div class="container mt-3">
            <h5 class="text-dark fw-light">List of questions</h5>
        </div>


        <div class="container list-of-questions">
            <div v-for="ask in questions" :key="ask.id">
                <a href="#" class="text-dark mb-0 pb-0" @click="questionSelectedFunc(ask.question)">{{ ask.question }}?</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'someQuestionsLeft',
    data(){
        return{
            questions: [
                {
                    id: 1,
                    question: 'What is Net Worth'
                },
                {
                    id: 2,
                    question: 'What is assets'
                },
                {
                    id: 3,
                    question: 'What is Net liabilities'
                }
            ],

        }
    },
    methods: {
        async getQuestions(){
            try{
                const res = await fetch('http://127.0.0.1:8000/getQuestions')
                const data = await res.json()

                if(!res.ok){
                    throw new Error('fetch error, ' + res.status);
                    
                }
                console.log("The data is, " + data)
            }catch(error){
                console.log('Error while fething data' + error)
            }
        },
        
        questionSelectedFunc(q){
            this.$emit('questionSelected', q);
        }
    }
}
</script>