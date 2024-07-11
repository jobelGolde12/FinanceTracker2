<template>
    <div>
        
        <div class="container p-2 left-header">
            <h5 class="fw-light text-dark">Finance tracker</h5>
        </div>


        <div class="left-body mt-5">

            
                <router-link :to="{ name: 'home', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-house-fill fs-5 color-4"></i>
                    Home
                </router-link>
            

                <router-link :to="{ name: 'networth', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-reception-4 fs-5 color-4"></i> 
                    Networth
                </router-link>

                <router-link :to="{ name: 'home', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-bell-fill fs-5 color-4"></i>
                    notification
                </router-link>

                <router-link :to="{ name: 'profile', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-person-fill fs-5 color-4"></i>
                    Profile 
                </router-link>

                <router-link :to="{ name: 'settings', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-gear-fill fs-5 color-4"></i>
                    Settings
                </router-link>

                <router-link :to="{ name: 'aboutUs', params: { id: this.id } }" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-info-circle-fill fs-5 color-4"></i>
                    About
                </router-link>
        </div>
    </div>
</template>
<script>
export default{
    name: 'left',
    props: ['id']
}
</script>

<style scoped>
@import '../../../css/dashboardCss/left.css';
</style>