<template>
    <section class="top-certifications-wrap session-dark">
        <div class="container">
            <h1 class="home-title">{{ data }}</h1>

            <div class="tab-content top-certifications-products">
                <HomeProductCard v-for="product in products" :key="product.id" :product="product"/>
            </div>
        </div>
    </section>
</template>

<script>
    import HomeProductCard from '../HomeProductCard.vue';
    export default {
        components: { HomeProductCard },
        props: ['data'],

        data() {
            return {
                products: []
            };
        },

        mounted() {
            this.getProducts();
        },

        methods: {
            selector() {
                return $('.top-certifications-products');
            },

            getProducts () {
                $.ajax({
                method: 'GET',
                url: route('storefront.top_products.index'),
                }).then((products) => {
                    this.products = products;
                    this.$nextTick(() => {
                        this.selector().slick(this.slickOptions());
                    });
                });
            },
            slickOptions() {
                return {
                    rows: 0,
                    dots: true,
                    arrows: true,
                    infinite: true,
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    rtl: window.FleetCart.rtl,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    responsive: [
                        {
                            breakpoint: 1761,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 5,
                            },
                        },
                        {
                            breakpoint: 1301,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                            },
                        },
                        {
                            breakpoint: 1051,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            },
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                            },
                        },
                        {
                            breakpoint: 881,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            },
                        },
                        {
                            breakpoint: 641,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            },
                        },
                    ],
                };
            },
        },
    };
</script>
