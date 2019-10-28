<template>
    <div>
        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#myModal">
            Add New Product
        </button>

        <input type="text" v-model="q" class="form-control mt-2 mb-0" id="search" placeholder="Search...">

        <table id="products-table" class="table table-sm table-dark mt-2 table-bordered">
            <thead>
            <tr>
                <th class="text-center">Id.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Starting Price</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in this.productsList">
                <td class="text-center">{{product.id}}</td>
                <td class="text-center">{{product.name}}</td>
                <td class="text-center">{{product.description}}</td>
                <td class="text-center">{{product.starting_price}} $</td>
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <!--                        <a class="btn btn-sm btn-warning" v-bind:href="'/start-auction?product_id='+product.id">-->

                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#auctionModal">
                            <i class="fas fa-coins"></i> Start Auction!
                        </button>
                        <button type="button" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </button>
                        <a class="btn btn-sm btn-info" href="#"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger" v-on:click="deleteProduct(product.id)"><i
                            class="fas fa-trash-alt"></i></button>
                    </div>

                </td>

            </tr>

            </tbody>
        </table>
        <div class="modal fade" id="auctionModal">
            <div class="modal-dialog bg-dark ">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-dark">Start Auction</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form @submit.prevent="formAuctionSubmit" id="auctionForm" action="">
                            <div class="form-group row">
                                <label for="select"
                                       class="col-md-3 col-form-label text-md-right text-dark">Product: </label>
                                <select name="select" id="select" v-model="auction.product_id">
                                    <option v-for="product in this.productsList" v-bind:value="product.id">
                                        {{product.name}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="duration"
                                       class="col-md-4 col-form-label text-md-right text-dark">Duration(Hours)</label>
                                <div class="col-md-6">
                                    <input v-model="auction.duration" type="text" id="duration" class="form-control"
                                           name="duration"
                                           required autofocus>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-primary" form="auctionForm"
                                type="submit">Start Auction!
                        </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="myModal">
            <div class="modal-dialog bg-dark ">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form @submit.prevent="formSubmit" id="modalForm" action="">
                            <picture-input
                                v-model="image"
                                ref="pictureInput"
                                :width="500"
                                max_files="5"
                                :removable="true"
                                removeButtonClass="ui red button"
                                :height="500"
                                accept="image/jpeg, image/png, image/gif"
                                buttonClass="ui button primary"
                                :customStrings="{
  upload: '<h1>Upload it!</h1>',
  drag: 'Drag and drop your image here'}">

                            </picture-input>
                            <button @click="addImage" v-bind:class="{ disabled: !image }">
                                Upload
                            </button>
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
            addImage() {
                this.image = this.$refs.pictureInput.file;
            },
            formSubmit() {
                axios
                    .post('/api/products', {
                        'name': this.name,
                        'description': this.description,
                        'starting_price': this.starting_price,
                        'image': this.image
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

            },
            formAuctionSubmit() {
                axios
                    .post('/api/auctions', {
                        'product_id': this.auction.product_id,
                        'duration': this.auction.duration,

                    })
                    .then(response => (
                        console.log(response)
                    ));

            },
        },
        data() {
            return {
                q: '',
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
                starting_price: '',
                auction: {
                    duration: '',
                    product_id: '',

                },
                image: null,

            }
        },
        computed: {
            productsList() {
                if (this.q) {
                    return this.products.filter((product) => {
                        return this.q.toLowerCase().split(' ').every(v => product.name.toLowerCase().includes(v))
                    })
                } else {
                    return this.products;
                }
            }
        }
    }
</script>
