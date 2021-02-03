<?php
function convertToReadableSize($size){
  $base = log($size) / log(1024);
  $suffix = array("", "KB", "MB", "GB", "TB");
  $f_base = floor($base);
  return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
}
?>

<div id="public-resources" class="tab-pane public-resources" :class="{ active: activeTab === 'public-resources' }">
    <table class="table table-bordered table-public-resources">
        <thead class="table-header-bg">
            <tr>
                <th scope="col" class="center-align-product">{{ trans('storefront::product_card.title_exam') }}</th>
                <th scope="col" class="title-product">{{ trans('storefront::product_card.title_product') }}</th>
                <th scope="col" class="center-align-product">{{ trans('storefront::product_card.title_files') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product->public_resources as $public_resource)
            <tr>
                <td class="center-align-product"><a href="{{$public_resource->path}}" download>{{$public_resource->filename}}</a></td>
                <td class="center-align-product">{{convertToReadableSize($public_resource->size)}}</td>
                <td class="center-align-product"><a href="{{$public_resource->path}}" download>Download</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
