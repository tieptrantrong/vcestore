<div id="private-resources" class="tab-pane private-resources" :class="{ active: activeTab === 'private-resources' }">
    <table class="table table-bordered table-private-resources">
        <thead class="table-header-bg">
            <tr>
                <th scope="col" class="center-align-product">{{ trans('storefront::product_card.title_exam') }}</th>
                <th scope="col" class="center-align-product">{{ trans('storefront::product_card.file_size') }}</th>
                <th scope="col" class="center-align-product"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product->private_resources as $private_resource)
            <tr>
                <td class="center-align-product"><a href="{{ route('download.file.vce', ['product_id'=>$product->id,'resource_id'=>$private_resource->id]) }}">{{$private_resource->filename}}</a></td>
                <td class="center-align-product">{{convertToReadableSize($private_resource->size)}}</td>
                <td class="center-align-product"><a href="{{ route('download.file.vce', ['product_id'=>$product->id,'resource_id'=>$private_resource->id]) }}">Download</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
