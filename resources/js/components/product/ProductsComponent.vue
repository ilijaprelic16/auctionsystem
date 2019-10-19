<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Open modal
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
<!--                        <h1 class="my-4">Page Heading-->
<!--                            <small>Secondary Text</small>-->
<!--                        </h1>-->
                        <div v-for="product in this.products" class="row mt-2">
                            <div class="col-md-7">
                                <a href="#">
                                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300"
                                         alt="">
                                </a>
                            </div>
                            <div class="col-md-5">
                                <h3>{{product.name}}</h3>
                                <p>{{product.description}} </p>
                                <a class="btn btn-primary" href="#">View Project</a>
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
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" name='description' class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea id="description">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="startingPrice" class="col-md-4 col-form-label text-md-right">Starting Price</label>
                            <div class="col-md-6">
                                <input id="startingPrice" type="number" class="form-control" name="starting_price" required autocomplete="new-password">

                            </div>
                        </div>
                    </form>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Add Product</button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
            axios
                .get('/api/products')
                .then(response => (
                    this.products = response.data.data
                ));

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
                }
            }
        }
    }
</script>
