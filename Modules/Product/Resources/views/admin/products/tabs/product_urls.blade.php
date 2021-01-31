<div id="private-product-group">
    {{--  Options will be added here dynamically using JS  --}}
</div>

<div class="box-footer no-border p-t-0">
    <div class="form-group pull-left">
        <div class="col-md-10">
            <button type="button" class="btn btn-default m-r-10" id="add-new-private-product">
                {{ trans('product::products.private_product.add_new_product') }}
            </button>
        </div>
    </div>
</div>
@include('product::admin.products.partials.private_product')
@push('globals')
    <script>
        FleetCart.data['product.privateUrlProducts'] = {!! old_json('options', $product->privateUrlProducts) !!};
        FleetCart.errors['product.privateUrlProducts'] = @json($errors->get('options.*'), JSON_FORCE_OBJECT);
    </script>
@endpush