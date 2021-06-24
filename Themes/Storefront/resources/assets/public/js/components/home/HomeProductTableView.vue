<template>
    <div class="top-practice-exams">
        <h1 class="home-title">{{ title }}</h1>
        <table class="table table-striped">
            <thead class="table-header-bg">
                <tr>
                    <th scope="col" class="">{{ $trans('storefront::product_card.title_vendor') }}</th>
                    <th scope="col" class="">{{ $trans('storefront::product_card.title_exam') }}</th>
                    <th scope="col" class="w-100">{{ $trans('storefront::product_card.title_filename') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td class=""><a :href="productUrl(product.slug)">{{product.vendor}}</a></td>
                    <td class=""><a :href="productUrl(product.slug)">{{product.name}}</a></td>
                    <td class="w-100">{{product.title}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        props: ['title'],
        data() {
            return {
                products: []
            };
        },
        mounted() {
            this.getProducts();
        },
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
            getProducts () {
                $.ajax({
                method: 'GET',
                url: route('storefront.top_practice_exams.index'),
                }).then((products) => {
                    this.products = products;
                });
            },
        },
    };
</script>
