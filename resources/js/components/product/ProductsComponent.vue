<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Add New Product
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div v-for="product in this.products" class="row mt-4">
                            <div class="col-md-4">
                                <a href="#">
                                    <img class="img-fluid rounded mb-3 mb-md-0" src="https://picsum.photos/300"
                                         alt="">
                                </a>
                            </div>
                            <div class="col-md-5">
                                <h3>{{product.name}}</h3>
                                <hr>
                                <p>{{product.description}} </p>
                                <h3 class="border text-center border-dark">{{product.starting_price}} $</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="btn-group-vertical">
                                    <a class="btn btn-warning" style="height: 50px" href="#">Start Auction!</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModal2">
                                        View
                                    </button>
                                    <a class="btn btn-info" href="#">Edit</a>
                                    <a class="btn btn-danger" href="#">Delete</a>
                                </div>

                            </div>




                        <div class="modal fade" id="myModal2">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <a href="#">
                                                <img class="img-fluid rounded mb-3 mb-md-0" src="https://picsum.photos/300"
                                                     alt="">
                                            </a>
                                        </div>
                                        <hr>
                                        <div class="text-center" >
                                            <h3>{{product.name}}</h3>
                                            <hr>
                                            <p>{{product.description}} </p>
                                            <h3 class="border text-center border-dark">{{product.starting_price}} $</h3>
                                        </div>

                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">


                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>


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
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" v-model="name" type="text" class="form-control" name="name"
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
                                    <label for="startingPrice" class="col-md-4 col-form-label text-md-right">Starting
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
    </div>

</template>


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
