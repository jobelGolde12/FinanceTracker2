<template>
    <div v-if="loadingData" class="loading-data">
        <p class="text-dark fw-light">Preparing data...</p>
    </div>


    <div v-if="!loadingData" class="main-container">
        <div class="container mt-3">
            <h5 class="text-dark fw-light">List of questions</h5>
        </div>


        <div class="container list-of-questions">
            <div v-for="ask in questions" :key="ask.id">
                <a href="#" class="text-dark mb-0 pb-0" @click="questionSelectedFunc(ask.question, ask.answer)">{{ ask.question }}?</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'someQuestionsLeft',
    data(){
        return{
            questions: [],
            loadingData: true

        }
    },
    methods: {
        async getQuestions(){

            try{


                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                if (!csrfToken) {
                    console.error('CSRF token not found');
                    return;
                } else {
                    console.log('CSRF FOUND');
                }
                const res = await fetch('http://127.0.0.1:8000/getQuestions',{
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                })

                if(!res.ok){
                    throw new Error('fetch error, ' + res.status);
                    
                } 
                const data = await res.json();
                console.log(" From left The data is, " + data)
                this.questions = data;
                this.loadingData = false;
            }catch(error){
                console.log('Error while fething data' + error)
                this.loadingData = false;
            }
        },
        
        questionSelectedFunc(q,a, isClicked){
            isClicked = true;
            this.$emit('questionSelected', [q,a, isClicked]);
        }
    },
    mounted(){
        this.getQuestions()
    }
}
</script>

<style lang="css" scoped>
    .main-container{
        position: relative;
        width: 20%;
        height: 100%;
    }
</style>