<template>
    <section class="featured-categories-wrap">
        <div class="container">
            <div class="featured-categories-header">
                <div class="featured-categories-text">
                    <h2 class="title">{{ data.title }}</h2>
                    <span class="excerpt">{{ data.subtitle }}</span>
                </div>
            </div>
            <div class="row">
                <div v-for="(category, index) in data.categories" :key="index" class="product-table table-responsive col-sm">
                    <table class="table">
                        <tr>
                            <th>
                                <h5><a :href="categoryUrl(category.slug)">{{ category.name }}</a></h5>
                            </th>
                        </tr>
                        <tr v-for="(product, id) in allProducts[index]" :key="id">
                            <td>
                                <a :href="productUrl(product.slug)">{{ product.slug }}</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                allProducts: []
            };
        },

        mounted() {
            this.getProducts();
        },

        methods: {
            selector() {
                return $('.featured-category-products');
            },

            productUrl(slug) {
                return route('products.show', slug);
            },

            categoryUrl(slug) {
                return route('categories.products.index', slug);
            },

            getProducts () {
                $.ajax({
                method: 'GET',
                url: route('storefront.featured_category_products.all', { categoryNumber: this.data.categories.length }),
                }).then((allProducts) => {
                    this.allProducts = allProducts;
                });
            }
        },
    };
</script>
