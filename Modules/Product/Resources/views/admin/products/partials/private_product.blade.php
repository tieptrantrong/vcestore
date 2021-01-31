<script type="text/html" id="private-product-template">
    <div class="content-accordion panel-group options-group-wrapper" id="product-<%- optionId %>">
        <div class="panel panel-default option">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#option-<%- optionId %>" href="#custom-collapse-<%- optionId %>">
                        <span id="product-url" class="pull-left">{{ trans('product::products.private_product.new_product') }}</span>
                    </a>
                </h4>
            </div>

            <div id="custom-collapse-<%- optionId %>" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="new-option clearfix">
                        <input type="hidden" name="privateUrlProducts[<%- optionId %>][id]" value="<%- option.id %>">
                        <div class="col-lg-11 col-md-11 p-l-0">
                            <div class="form-group">
                                <label for="option-<%- optionId %>-name">{{ trans('product::products.private_product.url') }}</label>
                                <input type="text" name="privateUrlProducts[<%- optionId %>][url]" class="form-control option-name-field" id="product-<%- optionId %>-name" value="<%- option.url %>">
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-1 p-l-0">
                            <button type="button" class="btn btn-default delete-option pull-right" data-toggle="tooltip" title="{{ trans('product::products.private_product.delete_product') }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
