<div class="custom-products">
    {{ Form::select('certificates', trans('storefront::attributes.products'), $errors, $product->certificates->pluck('name', 'id'), null, ['class' => 'selectize prevent-creation', 'data-url' => route('admin.products.index'), 'multiple' => true, 'select_all' => true]) }}
</div>