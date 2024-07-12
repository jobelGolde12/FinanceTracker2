<template>
<div class="parent-container bg-light flex-column gap-5 align-items-center">
    <div class="container right-header ps-5 pe-5 pt-4 mb-5 pb-5">
        <form action="#" class="form form-search">
            <div class="input-group mb-2">
                <input type="text" class="form-control bg-light text-dark" placeholder="Search categories..." aria-label="search" aria-describedby="basic-addon1" v-model="formSearch" required />
                <span class="input-group-text pointer hover" id="basic-addon1"><i class="bi bi-search"></i></span>
            </div>
        </form>

        <div class="category-container p-0 bg-light p-2" style="max-height: 35%; overflow-y: auto;">
            <div class="d-flex flex-row justify-content-between">
                <h5 class="text-dark text-dark fw-light">Categories</h5>
                <!-- <button class="btn btn-outline-success">New category</button> -->
               <div class="pointer text-success d-flex flex-row align-items-center">
                <i class="bi bi-plus fw-bold add-icon"></i>Add
               </div>
            </div>
            <div class="category d-flex flex-row align-items-center pointer" v-for="data in categoriesData" :key="data.id">
                <div class="category-logo">
                    <i class="text-success px-2 py-1 fw-normal me-2" :class="data.logo"></i>
                </div>

                <div class="category-name pt-3 flex-grow-1">
                    <p class="text-dark fw-normal">{{ data.name }}</p>
                </div>

                <div class="action ms-auto d-flex justify-content-end">
                    <i class="bi bi-arrow-right-short fs-3 hover pointer text-dark"></i>
                </div>
            </div>
        </div>

        
    </div>


        <div class="container profile-container mt-5 pt-5 px-3">
            <div class="profile-header d-flex flex-row gap-2 align-items-center">
                <div><img src="../../../images/bg2.jpg" alt="profile" class="rounded-circle"></div>
                <div><router-link to="profile" class="text-dark fw-semibold mt-2 pointer text-decoration-none">Jobel v. Golde</router-link></div>
            </div>
           
        </div>




        <div class="bottom-right-icon bg-success p-1" @mouseover="overQuestionFunc" @mouseleave="leaveQuestionFunc">
            <router-link to="/someQuestions" class="bi bi-question text-light m-0"></router-link>
        </div>

        <div class="bottom-right-icon-text bg-success p-1">
            <p class="text-light ps-1 pt-2">Answer me!</p>
        </div>

</div>
</template>

<script>
export default {
    name: 'right',
    data() {
        return {
            formSearch: '',
            categoriesData: [{
                    logo: 'bi bi-coin',
                    name: 'Financial',
                    id: 1
                },
                {
                    logo: 'bi bi-egg',
                    name: 'Food',
                    id: 2
                },
                {
                    logo: 'bi bi-heart',
                    name: 'Health',
                    id: 3
                },
                {
                    logo: 'bi bi-heart',
                    name: 'Health',
                    id: 3
                },
                {
                    logo: 'bi bi-heart',
                    name: 'Health',
                    id: 3
                }
            ]
        }
    },
    methods: {
        overQuestionFunc(){
            let iconText = document.querySelector('.bottom-right-icon-text');
            iconText.style.opacity = '1';
            iconText.style.right = '12%'
        },
        leaveQuestionFunc(){
            let iconText = document.querySelector('.bottom-right-icon-text');
            iconText.style.opacity = '0';
            iconText.style.right = '8%'
        }
    }
}
</script>

<style scoped>
@import '../../../css/dashboardCss/right.css';
</style>
