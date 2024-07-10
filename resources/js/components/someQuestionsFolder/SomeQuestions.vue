<template>
    <div class="main-container bg-light">
        <Left class="left bg-dark " @questionSelected="questionSelected"/>
        <Right class="right" :currentQuestion="questionSelectedParent" :currentAnswer="currentAnswer"/>
    </div>
</template>

<script>
import Left from './SomeQuestionsLeft.vue';
import Right from './SomeQuestionsRight.vue';
export default {
    name: 'someQuestions',
    components: {
        Left,Right
    },
    data(){
        return{
            questionSelectedParent: '',
            currentAnswer: ''
        }
    },
    methods: {
        
        questionSelected(q){
            this.questionSelectedParent = q[0];
            this.currentAnswer = q[1];
        }
    }
}
</script>

<style lang="css" scoped>
.main-container{
    position: absolute;
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: row;

}
.main-container .left{
    position: relative;
    width: 20%;
    height: 100%;

}
.main-container .right{
    position: relative;
    flex-grow: 1;
    height: 100%;
}
</style>