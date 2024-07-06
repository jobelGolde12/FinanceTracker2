<template>
    <div class="dashboard-main-container">
        <leftComponent class="left bg-light" />
        <div class="center bg-light">
            <router-view :id="id"></router-view>
        </div>
        <rightComponent class="right"/>
    </div>
</template>

<script>

import leftComponent from '../../components/dashboardFolder/Left.vue'
import rightComponent from '../../components/dashboardFolder/Right.vue'

export default{
    name: 'dashboard',
    data(){
        return{
            id: this.$route.params.id
        }
    },
    components: {
        leftComponent, rightComponent
    },
    methods: {
        passTheId(){
            this.$emit('getTheId', this.id)
        }
    },
    mounted(){
        console.log(this.id)
    }
}
</script>
<style scoped>
@import '../../../css/dashboardCss/dashboard.css';
</style>