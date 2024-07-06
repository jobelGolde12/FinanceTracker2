<template>
<div class="main-container">
    <div class="networth-section">
 
        <div class=" bg-same m-3 mt-3 rounded p-3">
            <h2 class="text-light mb-0 pb-0">Net Worth</h2>
            <div class="networth-summary text-light">
                <h3>Current Net Worth: $50,000</h3>
                <p>Change from last month: +5% ($2,500)</p>
            </div>
        </div>


        <div class="assets-liabilities  mt-5 justify-content-between align-items-center container-fluid d-flex flex-row">
                <div class="assets py-2 px-3">
                    <h3 class="text-dark fw-light">Assets</h3>
                    <canvas id="assetsChart"></canvas>
                </div>
            <div class="liabilities">
                <h3 class="text-dark fw-light">Liabilities</h3>
                <canvas id="liabilitiesChart"></canvas>
            </div>
        </div>
        <div class="networth-chart">
            <h4>Net Worth Over Time</h4>
            <!-- Chart code goes here -->
        </div>
    </div>

</div>
</template>

<script>
export default {
    name: 'Networth',
    data(){
        return{
            id: null
        }
    },
    methods: {
        assetsChart(){
            const assetsData = {
    labels: ['Cash', 'Investments', 'Real Estate', 'Vehicles', 'Other Assets'],
    datasets: [{
        label: 'Assets',
        data: [10000, 25000, 100000, 15000, 5000],
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)'
        ],
        hoverOffset: 4
    }]
};

// Configuration
const config = {
    type: 'doughnut',
    data: assetsData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': $' + tooltipItem.raw.toLocaleString();
                    }
                }
            }
        }
    },
};

// Create the chart
var myChart = new Chart(
    document.getElementById('assetsChart'),
    config
);
        },


        liabilitiesChart(){
            const assetsData = {
    labels: ['Mortgage', 'Loans', 'Credit Card', 'Other Debts'],
    datasets: [{
        label: 'Assets',
        data: [80000, 50000, 5000, 5000],
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
        ],
        hoverOffset: 4
    }]
};

// Configuration
const config = {
    type: 'doughnut',
    data: assetsData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': PHP' + tooltipItem.raw.toLocaleString();
                    }
                }
            }
        }
    },
};

// Create the chart
var myChart = new Chart(
    document.getElementById('liabilitiesChart'),
    config
);
        }
    },
    mounted(){
        this.assetsChart()
        this.liabilitiesChart()
        console.log(this.id)
    },
    computed:{
        id(){
            return this.$route.params.id;
        }
    }
}
</script>


<style scoped>
.main-container{
    position: absolute;
    width: 100%;
    height: 100vh;
    overflow-x: hidden;
    overflow-y: auto;
}
.main-container::-webkit-scrollbar {
    display: none;
}

.main-container::-webkit-scrollbar-track {
    display: none;
}

.main-container::-webkit-scrollbar-thumb {
    display: none;
}
</style>