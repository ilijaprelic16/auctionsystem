<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('ProductsComponent mounted.')
            axios
                .get('/api/products')
                .then(response => (
                    console.log(response.data)
                ));
            console.log('After axios.')

        }
    }
</script>
