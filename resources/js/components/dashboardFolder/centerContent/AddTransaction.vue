<template>
    <div>
        <div class="container add-transaction-header p-3">
            <h3 class="text-dark fw-light">Add transaction </h3>
        </div>

        <div class="container-fluid ">
            <form action="#" class="form">
                <div class="mb-2">
                    <label for="date" class="text-dark mb-1">Date</label>
                    <input type="date" class="form-control" id="date" v-model="transactionData.date" required>
                </div>

                <div class="mb-2">
                    <label for="category" class="text-dark mb-1">Category</label>
                    <input type="text" class="form-control" id="category" v-model="transactionData.category" required>
                </div>

                <div class="mb-2">
                    <label for="description" class="text-dark mb-1">Description</label>
                    <input type="text" class="form-control" id="description" v-model="transactionData.description" required>
                </div>

                <div class="mb-2">
                    <label for="amount" class="text-dark mb-1">Amount</label>
                    <input type="number" class="form-control" id="amount" v-model="transactionData.amount" required>
                </div>

                <div class="mb-2">
                    <label for="type" class="text-dark mb-1">Type</label>
                    <input type="text" class="form-control" id="type" v-model="transactionData.type">
                </div>

                <button class="btn btn-success mt-2 me-3" @click="addTransaction">Add to transaction</button>
                <router-link class="btn btn-outline-success mt-2" to="/dashboard/:id/">Back</router-link>
            </form>
        </div>
    </div>


    <!-- <Loading class="loading"/> -->
</template>

<script>
import Loading from '../../Loading.vue';
export default {
    name: 'AddTransaction',
    data(){
        return{
            transactionData: {
                user_id: this.id,
                date: '',
                category: '',
                description: '',
                amount: '',
                type: ''
            }
        }
    },
    props: ['id'],
    components: {
        Loading
    },
    methods: {
        async addTransaction(){
            // Validation 
            if(this.transactionData.user_id === '' || this.transactionData.date === '' || this.transactionData.category ===  '' || this.transactionData.description === '' || this.transactionData.amount === '' || this.transactionData.type === ''){
                return 0;

            }
            const res = await fetch('http://127.0.0.1:8000/addTransaction', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify(this.transactionData)
            })
            if(!res.ok){
                throw new Error('An error while posting data: ' + res.status)
            }
            const data = await res.json()
            console.log(data)
        }
    },
    // mounted(){
    //     console.log(this.transactionData.user_id)
    // }
}
</script>