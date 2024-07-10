<template>
    <div class="dashboard-main-container">

        <leftComponent class="left bg-light" />

        <LeftMobileView class=" left-mobile-view" />

        <div class="left-dark" @click="closeNavBar"></div>

        <div class="center bg-light">
            <router-view :id="id" ></router-view>
            <!-- @openNavBar="openNavBar" -->
        </div>


        <rightComponent class="right"/>
    </div>
</template>

<script>

import leftComponent from '../../components/dashboardFolder/Left.vue'
import rightComponent from '../../components/dashboardFolder/Right.vue'
import LeftMobileView from '../../components/dashboardFolder/LeftMobileView.vue';

export default{
    name: 'dashboard',
    data(){
        return{
            id: this.$route.params.id,
            isNavBarIsClicked: false
        }
    },
    components: {
        leftComponent, rightComponent, LeftMobileView
    },
    methods: {
        passTheId(){
            this.$emit('getTheId', this.id)
        },
        
        // openNavBar(isOpen){
        //     this.isNavBarIsClicked = isOpen;
        //     let left = document.querySelector('.left');
        //     let leftDark = document.querySelector('.left-dark');
            
        //     left.style.transition = '1';
        //     left.style.display = 'block';
        //     left.style.left = '0';
        //     left.style.position = 'absolute';
        //     left.style.zIndex = '5';
        //     left.style.width = '50%';
        //     left.style.borderRadius = '0 20px 20px 0';

        //     leftDark.style.display = 'block';    

        // },
        // closeNavBar(){
        //     // Ma butang dd condition if ang width === 750px amo lang ini eh execute 

        //     let left = document.querySelector('.left');
        //     let leftDark = document.querySelector('.left-dark');
            
        //     left.style.transition = '0';
        //     left.style.display = 'none';
        //     left.style.left = '-100%';
        //     left.style.position = 'absolute';
        //     left.style.zIndex = '0';
        //     left.style.width = '0';

        //     leftDark.style.display = 'none';    
        // }
    },
    
}
</script>
<style scoped>
@import '../../../css/dashboardCss/dashboard.css';
</style>