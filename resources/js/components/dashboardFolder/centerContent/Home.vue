<template>
<div class="center-body-container">
    <div class="center-header container-fluid d-flex justify-content-between align-items-center">
        <div class="container pt-3">
            <p class="text-dark fw-light mb-0 pb-0 greet"><span>{{ greetings }}</span> <span class="">{{ userData.username }}</span></p>
            <h5 class="text-dark mt-0 pt-0">Your daily update</h5>
        </div>

        <div class="container pt-3 d-flex align-items-center justify-content-end">
            <!-- <div><router-link to="#" class="btn btn-success me-5">Click</router-link></div> -->
            <div><i class="bi bi-sun fs-4 ms-5 me-4 lg:ps-5 lg:ms-5 xl:ps-5 hover pointer text-dark" @click="toggleTheme" v-if="!lightTheme"></i></div>
            <div><i class="bi bi-moon fs-4 ms-5 me-4 lg:ps-5 lg:ms-5 xl:ps-5 hover pointer text-light" @click="toggleTheme" v-if="lightTheme"></i></div>
            <div><i class="bi bi-list fs-4 text-dark pointer" @click="navbarIsClicked"></i></div>
        </div>
    </div>

    <div class="center-body mt-3">
        <div class="card card1 d-flex flex-row bg-light border-none  p-2 rounded gap-0 mt-3">
            <div class="container">
                <h5 class="text-dark fw-light mb-0 pb-0">Networth</h5>
                <p class="text-dark fw-lighter pb-0 mb-0">Assets: <span class="text-success">{{ netWorth.assets }}</span></p>
                <p class="text-dark fw-lighter pb-0 mb-0">Liabilities: <span class="text-success">{{ netWorth.liabilities }}</span></p>
                <p class="text-dark fw-lighter">Current networth: <span class="text-success">{{ netWorth.currentNetworth }}</span></p>
                <router-link class="btn btn-success" to="netWorth">View </router-link>
            </div>

            <div class="ps-5 ms-5 text-dark ">
                <canvas id="myDoughnutChart" class=" ms-5 text-dark"></canvas>
            </div>
        </div>

        <div class="container-fluid d-flex flex-row justify-content-between align-items-center mt-5 pt-3">
            <div>
                <h5 class="text-dark fw-lighter">Recent Transactions Table</h5>
            </div>
            <div>
                <router-link to="addTransaction" class="btn btn-success"><i class="bi bi-plus me-1 fw-bold"></i>Add Transactions</router-link>
            </div>
        </div>

        <div class="main-container container- mt-3 p-2">
            <table class="table table-striped text-dark table-responsive">
                <thead>
                    <tr>
                        <th class="text-dark bg-light">Date</th>
                        <th class="text-dark bg-light">Category</th>
                        <th class="text-dark bg-light">Description</th>
                        <th class="text-dark bg-light">Amount</th>
                        <th class="text-dark bg-light">Type</th>
                        <th class="text-dark bg-light">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(data, index) in resentTransactionsData" :key="data.id">
                        <td class="pt-3 text-dark bg-light">{{ data.date }}</td>
                        <td class="pt-3 text-dark bg-light">{{ data.category }}</td>
                        <td class="pt-3 text-dark bg-light">{{ data.description }}</td>
                        <td class="pt-3 text-dark bg-light">{{ data.amount }}</td>
                        <td class="pt-3 text-dark bg-light">{{ data.type }}</td>
                        <td class="text-dark bg-light "><button class="btn btn-success" @click="viewTransaction(index)">View</button></td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="container m-2 d-flex justify-content-center align-items-center pointer hover">
            <p class="text-dark" v-if="!resentTransactionTableExpanded" @click="toggleResentTransactionDataFunc">View all <i class="bi bi-eye-fill ms-2"></i></p>
            <p class="text-dark" v-if="resentTransactionTableExpanded" @click="toggleResentTransactionDataFunc">Minimize <i class="bi bi-eye-fill ms-2"></i></p>
        </div>

        <div class="container">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi nam soluta rerum voluptatum assumenda tenetur, asperiores similique alias iure impedit incidunt voluptas nemo, quibusdam adipisci harum, dolorem hic sunt voluptatibus.</p>
        </div>

    </div>

</div>
</template>

<script>
export default {
    name: 'home',
    data() {
        return {
            userData: {
                username: '',

            },
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            greetings: '',
            lightTheme: false,
            resentTransactionTableExpanded: false,
            netWorth: {
                assets: 30000,
                liabilities: 5000,
                currentNetworth: 0
            },
            id: this.$route.params.id,
        //             props: {
        //     userData: {
        //     type: Object,
        //     required: true
        //     }
        // },
            resentTransactionsData: [{
                    "id": 1,
                    "date": "2024-06-22",
                    "category": "Food",
                    "description": "Groceries",
                    "amount": 75.50,
                    "type": "Expense"
                },
                {
                    "id": 2,
                    "date": "2024-06-21",
                    "category": "Income",
                    "description": "Salary Payment",
                    "amount": 2500.00,
                    "type": "Income"
                },
                {
                    "id": 3,
                    "date": "2024-06-20",
                    "category": "Utilities",
                    "description": "Electricity Bill",
                    "amount": 120.75,
                    "type": "Expense"
                },
                {
                    "id": 3,
                    "date": "2024-06-19",
                    "category": "Entertainment",
                    "description": "Dining Out",
                    "amount": 45.30,
                    "type": "Expense"
                },
                {
                    "id": 4,
                    "date": "2024-06-18",
                    "category": "Health",
                    "description": "Gym Membership",
                    "amount": 60.00,
                    "type": "Expense"
                },
                {
                    "id": 5,
                    "date": "2024-06-17",
                    "category": "Income",
                    "description": "Freelance Project",
                    "amount": 500.00,
                    "type": "Income"
                },
                {
                    "id": 6,
                    "date": "2024-06-16",
                    "category": "Entertainment",
                    "description": "Netflix Subscription",
                    "amount": 15.99,
                    "type": "Expense"
                },
                {
                    "id": 8,
                    "date": "2024-06-15",
                    "category": "Transportation",
                    "description": "Public Transport",
                    "amount": 30.00,
                    "type": "Expense"
                },
                {
                    "id": 9,
                    "date": "2024-06-14",
                    "category": "Housing",
                    "description": "Home Rent",
                    "amount": 1200.00,
                    "type": "Expense"
                },
                {
                    "id": 10,
                    "date": "2024-06-13",
                    "category": "Income",
                    "description": "Investment Dividend",
                    "amount": 100.00,
                    "type": "Income"
                }
            ]

        }
        
    },
    
    methods: {
        getNetworthChart() {
            const data = {
                labels: ['Assets', 'Liabilities'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [this.netWorth.assets, this.netWorth.liabilities],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)'
                    ],
                    hoverOffset: 4
                }]
            };

            // Configuration
            const config = {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2);
                                }
                            }
                        }
                    }
                },
            };

            // Create the chart
            var myChart = new Chart(
                document.getElementById('myDoughnutChart'),
                config
            );
        },
        toggleTheme() {
            const allElements = document.body.querySelectorAll('*');
            this.lightTheme = !this.lightTheme;

            // Toggle classes for the body itself
            document.body.classList.toggle('bg-light');
            document.body.classList.toggle('text-dark');
            document.body.classList.toggle('bg-dark');
            document.body.classList.toggle('text-light');

            // Toggle classes for all child elements
            allElements.forEach(function (element) {
                if (element.classList.contains('bg-light')) {
                    element.classList.remove('bg-light');
                    element.classList.add('bg-dark');
                    // this.lightTheme = true;
                } else if (element.classList.contains('bg-dark')) {
                    element.classList.remove('bg-dark');
                    element.classList.add('bg-light');
                    // this.lightTheme = false;
                }

                if (element.classList.contains('text-dark')) {
                    element.classList.remove('text-dark');
                    element.classList.add('text-light');
                } else if (element.classList.contains('text-light')) {
                    element.classList.remove('text-light');
                    element.classList.add('text-dark');
                }
            });
        },
        getCurrentDate() {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return now.toLocaleDateString(undefined, options);
        },
        getGreeting() {
            const now = new Date();
            const hours = now.getHours();

            if (hours < 12) {
                this.greetings = "Good morning";
            } else if (hours < 18) {
                this.greetings = "Good afternoon";
            } else {
                this.greetings = "Good evening";
            }
        },
        ResentTransactionDataFunc() {
            if (this.resentTransactionsData.length >= 4) {
                let mainContainer = document.querySelector('.main-container')
                mainContainer.style.maxHeight = '50%'
                this.resentTransactionTableExpanded = false
                console.log('50%')
            } else {
                mainContainer.style.maxHeight = 'auto'
                this.resentTransactionTableExpanded = true
                console.log('auto')
            }
        },
        toggleResentTransactionDataFunc() {
            let mainContainer = document.querySelector('.main-container')
            if (this.resentTransactionTableExpanded) {
                mainContainer.style.maxHeight = '50%'
            } else {
                mainContainer.style.maxHeight = '100%'
            }
            this.resentTransactionTableExpanded = !this.resentTransactionTableExpanded;

        },
        viewTransaction(index) {
            this.$router.push({
                name: 'viewTransaction',
                params: {
                    index,
                    query: {
                        date: this.resentTransactionsData[index].date,
                        category: this.resentTransactionsData[index].category,
                        description: this.resentTransactionsData[index].description,
                        amount: this.resentTransactionsData[index].amount,
                        type: this.resentTransactionsData[index].type
                    }
                }
            })
        },
        async getUsername(){
            const res = await fetch('http://127.0.0.1:8000/getUsername', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    id: this.id,
                    _token: this.csrfToken
                })
            })
            const data = await res.json();
            // this.userData.username = data[this.id].username
            this.userData.username = data.username;
        },
        async fetchTransaction(){

            try{

            const crfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

                if(crfToken){
                    console.log('Token found')
                }else{
                    console.log('Token not found')
                }

                const res = await fetch('http://127.0.0.1:8000/getTransaction', {
                method: 'GET',
                headers: {
                    'Content-type' : 'application/json' ,
                     'X-CSRF-TOKEN': crfToken
                }
            })

            const data = await res.json();
            if(!res.ok){
                throw new Error('An error while fetching data, response = ' + res.status)
            }else{
                console.log('data was fetch successfully...', data)
            }
            }catch(error){
                console.log('An error while fetching data', error)
            }

        },
        getCurrentNetworth(){
            let netWorth = this.netWorth.assets - this.netWorth.liabilities;
            this.netWorth.currentNetworth = netWorth;
        },
        navbarIsClicked(){
            this.$emit('openNavBar', true);
        }
    },
    mounted() {
        this.getNetworthChart()
        this.getCurrentDate()
        this.getGreeting()
        this.ResentTransactionDataFunc()
        this.getUsername()
        this.fetchTransaction()
        this.getCurrentNetworth()
    },
    beforeRouteUpdate(to, from, next) {
    // Force a re-render by updating a key
    this.$forceUpdate();
    next();
  }
}
</script>

    <!-- the home style is on the center.css  -->

<style scoped>
@import '../../../../css/dashboardCss/center.css';
</style>
