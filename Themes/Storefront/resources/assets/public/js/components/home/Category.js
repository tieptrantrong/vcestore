export default {
    props: [
        'initialCategorySlug'
    ],

    data() {
        return {
            fetchingProducts: true,
            products: { data: [] }
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
            }).catch((xhr) => {
                this.$notify(xhr.responseJSON.message);
            }).always(() => {
                this.fetchingProducts = false;
            });
        },
    },
};
