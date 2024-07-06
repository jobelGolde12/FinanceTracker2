<template>
    <div>
       <h3 class="text-dark fw-light">Your transaction</h3>

        <div class="container current-transaction">
            <div>
                Date: {{ transactionData.date }}
            </div>
        </div>


       <div class="container-fluid " v-if="updateTransaction">
            <form action="#" class="form">
                <div class="mb-2">
                    <label for="date" class="text-dark mb-1">Date</label>
                    <input type="date" class="form-control" id="date" v-model="transactionData.date">
                </div>

                <div class="mb-2">
                    <label for="category" class="text-dark mb-1">Category</label>
                    <input type="text" class="form-control" id="category" v-model="transactionData.category">
                </div>

                <div class="mb-2">
                    <label for="description" class="text-dark mb-1">Description</label>
                    <input type="text" class="form-control" id="description" v-model="transactionData.description">
                </div>

                <div class="mb-2">
                    <label for="amount" class="text-dark mb-1">Amount</label>
                    <input type="number" class="form-control" id="amount" v-model="transactionData.amount">
                </div>

                <div class="mb-2">
                    <label for="type" class="text-dark mb-1">Type</label>
                    <input type="text" class="form-control" id="type" v-model="transactionData.type">
                </div>

                <button class="btn btn-success mt-2 me-3" type="submit">Add to transaction</button>
                <router-link class="btn btn-outline-success mt-2" to="/dashboard/">Back</router-link>
            </form>
        </div>


        <router-link to="/dashboard">Back</router-link>
    </div>
</template>

<script>
export default {
    name: 'ViewTransaction',
    data(){
        return{
            transactionData: {
                date: '',
                category: '',
                description: '',
                amount: '',
                type: ''
            },
            updateTransaction: false,
        }
    },
    methods:{
        index(){
            return this.$route.params.index;
        },
        date(){
            return this.$route.query.date;
        }
    },
    mounted() {
    //    this.index();
    //    this.date();
    console.log(date())
    }
}
</script>