export default {
    props: [
        'initialCategorySlug'
    ],

    data() {
        return {
            fetchingProducts: true,
            products: { data: [] },
            productsL: [],
            productsR: []
        };
    },

    computed: {
        emptyProducts() {
            return this.products.data.length === 0;
        }
    },

    mounted() {
        this.fetchProducts();
    },

    methods: {

        fetchProducts() {
            this.fetchingProducts = true;

            $.ajax({
                url: route('categories.products.index', this.initialCategorySlug),
            }).then((response) => {
                this.products = response.products;
                var size = this.products.data.length / 2;
                this.productsL = this.products.data.slice(0, size);
                this.productsR = this.products.data.slice(size, this.products.data.length);
            }).catch((xhr) => {
                this.$notify(xhr.responseJSON.message);
            }).always(() => {
                this.fetchingProducts = false;
            });
        },
    },
};
