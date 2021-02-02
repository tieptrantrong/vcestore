<template>
    <div class="table-products">
        <table class="table table-bordered">
            <thead class="table-header-bg">
                <tr>
                    <th scope="col" class="center-align-product">{{ $trans('storefront::product_card.title_exam') }}</th>
                    <th scope="col" class="title-product">{{ $trans('storefront::product_card.title_product') }}</th>
                    <th scope="col" class="center-align-product">{{ $trans('storefront::product_card.title_files') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products.data" :key="product.id">
                    <td class="center-align-product"><a :href="productUrl(product.slug)">{{product.name}}</a></td>
                    <td class="title-product"><a :href="productUrl(product.slug)">{{product.title}}</a></td>
                    <td class="center-align-product">{{product.public_resources.length}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        props: ['products'],
        methods: {

            productUrl(slug) {
                return route('products.show', slug);
            },

            categoryUrl(slug) {
                return route('categories.products.index', slug);
            },
        },
    };
</script>
