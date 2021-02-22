<template>
    <div>
        <div class="d-none d-xl-block">
            <div class="row">
                <div class="col-xl-9">
                    <table class="table table-striped">
                        <thead class="table-header-bg">
                            <tr>
                                <th scope="col" class="">{{ $trans('storefront::product_card.title_vendor') }}</th>
                                <th scope="col" class="">{{ $trans('storefront::product_card.title_exam') }}</th>
                                <th scope="col" class="w-100">{{ $trans('storefront::product_card.title_filename') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products.data" v-if="isCertificate(product)" :key="product.id">
                                <td class=""><a :href="productUrl(product.slug)">{{product.vendor}}</a></td>
                                <td class=""><a :href="productUrl(product.slug)">{{product.name}}</a></td>
                                <td class="w-100">{{product.title}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-9">
                    <table class="table table-striped">
                        <thead class="table-header-bg">
                            <tr>
                                <th scope="col" class="">{{ $trans('storefront::product_card.title_vendor') }}</th>
                                <th scope="col" class="">{{ $trans('storefront::product_card.title_exam') }}</th>
                                <th scope="col" class="w-100">{{ $trans('storefront::product_card.title_filename') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products.data" v-if="isCertificate(product)" :key="product.id">
                                <td class=""><a :href="productUrl(product.slug)">{{product.vendor}}</a></td>
                                <td class=""><a :href="productUrl(product.slug)">{{product.name}}</a></td>
                                <td class="w-100">{{product.title}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-xl-none">
            <table class="table table-striped">
                <thead class="table-header-bg">
                    <tr>
                        <th scope="col" class="">{{ $trans('storefront::product_card.title_vendor') }}</th>
                        <th scope="col" class="">{{ $trans('storefront::product_card.title_exam') }}</th>
                        <th scope="col" class="w-100">{{ $trans('storefront::product_card.title_filename') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products.data" :key="product.id">
                        <td class=""><a :href="productUrl(product.slug)">{{product.vendor}}</a></td>
                        <td class=""><a :href="productUrl(product.slug)">{{product.name}}</a></td>
                        <td class="w-100">{{product.title}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
            }
        },
    };
</script>
