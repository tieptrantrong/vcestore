@include('media::admin.image_picker.files', [
    'title' => trans('product::products.form.public_resources'),
    'inputName' => 'files[public_resources][]',
    'files' => $product->public_resources,
])