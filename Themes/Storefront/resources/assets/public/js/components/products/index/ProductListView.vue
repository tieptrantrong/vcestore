<template>
    <div class="list-products">
        <ul class="vendorList">
            <li v-for="product in products.data" v-if="isCertificate(product)" :key="product.id">
                <a :href="productUrl(product.slug)">{{product.name}}</a> - {{product.title}}
            </li>
        </ul>
    </div>
</template>

<script>

    export default {
        props: ['products', 'is_certificate'],
        methods: {

            productUrl(slug) {
                return route('products.show', slug);
            },

            categoryUrl(slug) {
                return route('categories.products.index', slug);
            },

            isCertificate(product) {
                return product.is_certificate == this.is_certificate;
            },

            formatDate(date) {
                var mydate = new Date(date);
                return mydate.toDateString();
            }
        },
    };
</script>
