<template>
    <div class="main-container bg-success rounded">

        <div class=" d-flex flex-row gap-2">

                <router-link :to="{ name: 'home', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-house-fill fs-5 bg-light text-dark px-2  py-1 radius-50"></i>
                    Home
                </router-link>
            

                <router-link :to="{ name: 'networth', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-reception-4 fs-5 text-light"></i> 
                    Networth
                </router-link>

                <router-link :to="{ name: 'home', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-bell-fill fs-5 text-light"></i>
                    notification
                </router-link>

                <router-link :to="{ name: 'profile', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-person-fill fs-5 text-light"></i>
                    Profile 
                </router-link>

                <router-link :to="{ name: 'settings', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-gear-fill fs-5 text-light"></i>
                    Settings
                </router-link>
        </div>
    </div>
</template>
<script>
export default{
    name: 'leftMobileView',
    props: ['id'],
    mounted(){
        console.log('Left mobile view mounted')
    }
}
</script>

<style scoped>
/* .main-container{
    position: fixed;
    top: 80%;
    width: 100vw;
    height: 10%;
} */
</style>