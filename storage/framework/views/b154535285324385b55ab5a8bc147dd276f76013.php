<div class="table-responsive">
    <table class="table table-borderless shopping-cart-table">
        <thead>
            <tr>
                <th><?php echo e(trans('storefront::cart.table.image')); ?></th>
                <th><?php echo e(trans('storefront::cart.table.product_name')); ?></th>
                
                <th><?php echo e(trans('storefront::cart.table.line_total')); ?></th>
                <th>
                    <button class="btn-remove" @click="clearCart">
                        <i class="las la-times"></i>
                    </button>
                </th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="cartItem in cart.items" :key="cartItem.id">
                <td>
                    <div class="product-image">
                        <img
                            :src="baseImage(cartItem.product)"
                            :class="{ 'image-placeholder': ! hasBaseImage(cartItem.product) }"
                            alt="product image"
                        >
                    </div>
                </td>

                <td>
                    <a
                        :href="productUrl(cartItem.product)"
                        class="product-name"
                        v-text="cartItem.product.name"
                    >
                    </a>

                    <ul class="list-inline product-options" v-cloak>
                        <li v-for="option in cartItem.options">
                            <label>{{ option.name }}:</label> {{ optionValues(option) }}
                        </li>
                    </ul>
                </td>
                
                <td>
                    <label><?php echo e(trans('storefront::cart.table.line_total:')); ?></label>

                    <span class="product-price" v-html="cartItem.total.inCurrentCurrency.formatted"></span>
                </td>

                <td>
                    <button class="btn-remove" @click="remove(cartItem)">
                        <i class="las la-times"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/vcestore/Themes/Storefront/views/public/cart/index/cart_items.blade.php ENDPATH**/ ?>