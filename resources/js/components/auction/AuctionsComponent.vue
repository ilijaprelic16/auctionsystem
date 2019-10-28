<template>
    <div>
        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#myModal">
            Start New Auction
        </button>


        <table id="auctions-table" class="table table-sm table-dark mt-2 table-bordered">
            <thead>
            <tr>
                <th class="text-center">Id.</th>
                <th class="text-center">Time Left</th>
                <th class="text-center">Product Name</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="auction in this.auctions">
                <td class="text-center">{{auction.id}}</td>
                <td class="text-center">{{auction.time_left}} H</td>
                <td class="text-center">{{auction.product.name}}</td>

            </tr>

            </tbody>
        </table>


    </div>


</template>
<style module>


</style>

<script>
    export default {
        mounted() {
            console.log('ProductsComponent mounted.');
console.log(this.auctions);
        },
        created() {
            this.getData()
        },
        methods: {
            getData() {
                axios
                    .get('/api/auctions')
                    .then(response => (
                        this.auctions = response.data.data
                    ));

            },

        },
        data() {
            return {
                auctions: {
                    auction: {
                        id: '',
                        active: '',
                        start_time: '',
                        end_time: '',
                        time_left: '',
                        product: {
                            id: '',
                            name: '',
                            user_id: '',
                            description: '',
                            starting_price: '',
                        }
                    }
                },
            }
        },
    }
</script>
