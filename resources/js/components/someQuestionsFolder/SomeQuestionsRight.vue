<template>
    <div>
        <div class="right-header container-fluid d-flex justify-content-center align-items-center pt-2 px-5">
            <div class="container mx-5">
                <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Search question..." aria-label="search" aria-describedby="basic-addon1" v-model="searchQuestion" required />
                <span class="input-group-text pointer hover" id="basic-addon1"><i class="bi bi-search"></i></span>
            </div>
            </div>
        </div>

        <div class="container">
            <h3 class="text-dark fw-light d-inline">Question: </h3>
            <span class="currentQuestion text-success">{{ currentQuestion }}</span>
        </div>


        <div class="container mt-2">
            <p class="text-dark fw-light d-inline">Answer </p> <br>
            <span class="currentAnswer text-success">{{ currentAnswer }}</span>
        </div>


    </div>
</template>

<script>
export default {
    name: 'someQuestionsRight',
    data(){
        return{
            searchQuestion: '',
            currentQuestion: 'What is net worth',
            currentAnswer: 'blaaaaaaaa'
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
        }
    },
    mounted(){
        this.getQuestions()
    }
}
</script>