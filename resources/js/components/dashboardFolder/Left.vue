<template>
    <div>
        
        <div class="container p-2 left-header">
            <h5 class="fw-light text-dark">Finance tracker</h5>
        </div>


        <div class="left-body mt-5">

            
                <router-link to="" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-house-fill fs-5 color-4"></i>
                    Home
                </router-link>
            

                <router-link to="netWorth" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-reception-4 fs-5 color-4"></i> 
                    Networth
                </router-link>

                <router-link to="" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-bell-fill fs-5 color-4"></i>
                    notification
                </router-link>

                <router-link to="" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-person-fill fs-5 color-4"></i>
                    Profile 
                </router-link>

                <router-link to="settings" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-gear-fill fs-5 color-4"></i>
                    Settings
                </router-link>

                <router-link to="" class="text-decoration-none text-dark text-uppercase p-2 mb-2">
                    <i class="bi bi-info-circle-fill fs-5 color-4"></i>
                    About
                </router-link>
        </div>
    </div>
</template>
<script>
export default{
    name: 'left'
}
</script>

<style scoped>
@import '../../../css/dashboardCss/left.css';
</style>