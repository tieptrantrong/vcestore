<template>
    <div class="product-card">
        <div class="product-card-top">
            <a :href="productUrl" class="product-image">
                <img :src="baseImage" :class="{ 'image-placeholder': ! hasBaseImage }" alt="product image">
            </a>
        </div>

        <div class="product-card-title">
            <a :href="productUrl" class="product-title">
                <h6>{{ product.name }}</h6>
            </a>
        </div>
    </div>
</template>

<script>
    import ProductRating from './ProductRating.vue';
    import ProductCardMixin from '../mixins/ProductCardMixin';

    export default {
        components: { ProductRating },

        mixins: [
            ProductCardMixin,
        ],

        props: ['product'],
    };
</script>
