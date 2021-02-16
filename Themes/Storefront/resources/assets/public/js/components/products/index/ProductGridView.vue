<template>
<div class="hot-provider all-brands">
    <div class="all-brands-inner">
        <div v-for="product in products.data" v-if="isCertificate(product)" :key="product.id" class="col-lg-3 col-md-6 col-9 category-item">


            <div class="card">
                <img class="card-img" :src="baseImage(product)" alt="brand image" />
                <div class="card-info">
                    <h1 class="card-title">{{product.title}}</h1>
                </div>
            </div>


        </div>
    </div>
</div>
</template>
<script>
    import ProductHelpersMixin from '../../../mixins/ProductHelpersMixin';

    export default {
        mixins: [
            ProductHelpersMixin,
        ],
        props: ['products', 'is_certificate'],
        methods: {

            productUrl(slug) {
                return route('products.show', slug);
            },

            isCertificate(product) {
                return product.is_certificate == this.is_certificate;
            }
        },
    };
</script>