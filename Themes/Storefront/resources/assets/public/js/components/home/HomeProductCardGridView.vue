<template>
    <div class="home-products col-6 col-xl-3">
        <HomeProductCard :product="product"/>
    </div>
</template>

<script>
    import HomeProductCard from '../HomeProductCard.vue';

    export default {
        components: { HomeProductCard },

        props: ['product'],
    };
</script>
