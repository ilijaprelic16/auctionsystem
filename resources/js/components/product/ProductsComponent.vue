<template>
    <div>
        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#myModal">
            Add New Product
        </button>
        <table id="products-table" class="table table-sm table-dark mt-2 table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Starting Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in this.products">
                <td>{{product.id}}</td>
                <td>{{product.name}}</td>
                <td>{{product.description}}</td>
                <td>{{product.starting_price}} $</td>
                <td>
                <a class="btn btn-sm btn-warning" v-bind:href="'/start-auction?product_id='+product.id">Start Auction!</a>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal">
                    View
                </button>
                <a class="btn btn-sm btn-info" href="#">Edit</a>
                <button class="btn btn-sm btn-danger" v-on:click="deleteProduct(product.id)">Delete</button>
                </td>

            </tr>

            </tbody>
        </table>


        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form @submit.prevent="formSubmit" id="modalForm" action="">
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" v-model="name" type="text" class="form-control"
                                           name="name"
                                           required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                <textarea v-model="description" name='description' id="description">
                                </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="startingPrice"
                                       class="col-md-4 col-form-label text-md-right">Starting
                                    Price</label>
                                <div class="col-md-6">
                                    <input id="startingPrice" v-model="starting_price" type="number"
                                           class="form-control" name="starting_price" required
                                           autocomplete="new-password">

                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-primary" form="modalForm"
                                type="submit">Add Product
                        </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




</template>
<style module>

</style>

<script>
    export default {
        mounted() {
            console.log('ProductsComponent mounted.');

        },
        created() {
            this.getData()
        },
        methods: {
            getData() {
                axios
                    .get('/api/products')
                    .then(response => (
                        this.products = response.data.data
                    ));

            },
            formSubmit() {
                axios
                    .post('/api/products', {
                        'name': this.name,
                        'description': this.description,
                        'starting_price': this.starting_price
                    })
                    .then(response => (
                        this.getData()
                    ));


            },
            deleteProduct(id) {
                axios
                    .delete('/api/products/' + id)
                    .then(response => (
                        this.getData()
                    ));

            }

        },
        data() {
            return {
                products: {
                    product: {
                        id: '',
                        name: '',
                        user_id: '',
                        description: '',
                        starting_price: ''
                    }
                },
                id: '',
                name: '',
                user_id: '',
                description: '',
                starting_price: ''

            }
        }
    }
</script>
