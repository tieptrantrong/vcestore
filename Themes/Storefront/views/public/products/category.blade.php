@extends('public.layout')

@section('title')
    @if (request()->has('query'))
        {{ trans('storefront::products.search_results_for') }}: "{{ request('query') }}"
    @else
        {{ trans('storefront::products.shop') }}
    @endif
@endsection

@push('globals')
    <script>
        FleetCart.langs['storefront::products.showing_results'] = '{{ trans("storefront::products.showing_results") }}';
        FleetCart.langs['storefront::products.show_more'] = '{{ trans("storefront::products.show_more") }}';
        FleetCart.langs['storefront::products.show_less'] = '{{ trans("storefront::products.show_less") }}';
    </script>
@endpush

@section('content')
    <product-index
        initial-query="{{ request('query') }}"
        initial-brand-name="{{ $brandName ?? '' }}"
        initial-brand-banner="{{ $brandBanner ?? '' }}"
        initial-brand-slug="{{ request('brand') }}"
        initial-category-name="{{ $categoryName ?? '' }}"
        initial-category-banner="{{ $categoryBanner ?? '' }}"
        initial-category-slug="{{ request('category') }}"
        initial-tag-name="{{ $tagName ?? '' }}"
        initial-tag-slug="{{ request('tag') }}"
        :initial-attribute="{{ json_encode(request('attribute', [])) }}"
        :max-price="{{ $maxPrice }}"
        initial-sort="{{ request('sort', 'alphabetic') }}"
        :initial-per-page="{{ request('perPage', 150) }}"
        :initial-page="{{ request('page', 1) }}"
        initial-view-mode="{{ request('viewMode', 'grid') }}"
        inline-template
    >
        <section class="product-search-wrap">
            <div class="container">
                <div class="row">
                    <div class="col products-left">
                        <div class="d-none d-lg-block categories-banner" v-if="brandBanner">
                            <img :src="brandBanner" alt="Brand banner">
                        </div>

                        <div class="d-none d-lg-block categories-banner" v-else-if="categoryBanner">
                            <img :src="categoryBanner" alt="Category banner">
                        </div>

                        <div class="search-result">
                            <div class="search-result-top">
                                <div class="content-left">
                                    <h4 v-if="queryParams.query">
                                        {{ trans('storefront::products.search_results_for') }} <span>"@{{ queryParams.query }}"</span>
                                    </h4>
                                    <h4 v-else-if="queryParams.brand" v-text="initialBrandName"></h4>
                                    <h4 v-else-if="queryParams.category" v-text="categoryName"></h4>
                                    <h4 v-else-if="queryParams.tag" v-text="initialTagName"></h4>
                                    <h4 v-else>{{ trans('storefront::products.shop') }}</h4>
                                </div>

                                <div class="content-right">
                                    <div class="mobile-view-filter">
                                        <i class="las la-sliders-h"></i>
                                        {{ trans('storefront::products.filters') }}
                                    </div>

                                    <div class="sorting-bar">
                                        <div class="form-group m-r-20">
                                            <select
                                                class="form-control custom-select-option right arrow-black"
                                                v-model="queryParams.sort"
                                                ref="sortSelect"
                                            >
                                                @foreach (trans('storefront::products.sort_options') as $key => $value)
                                                    <option
                                                        value="{{ $key }}"
                                                        {{ request('sort', 'latest') === $key ? 'selected' : '' }}
                                                    >
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select
                                                class="form-control custom-select-option right arrow-black"
                                                v-model="queryParams.perPage"
                                                ref="perPageSelect"
                                            >
                                                @foreach (trans('storefront::products.per_page_options') as $key => $value)
                                                    <option
                                                        value="{{ $key }}"
                                                        {{ request('perPage', 30) == $key ? 'selected' : '' }}
                                                    >
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="search-result-middle" :class="{ empty: emptyProducts, loading: fetchingProducts }">

                                <div class="table-view-products">
                                    <product-table-view :products="products"></product-table-view>
                                </div>

                                <div class="empty-message" v-if="! fetchingProducts && emptyProducts">
                                    @include('public.products.index.empty_results_logo')

                                    <h2>{{ trans('storefront::products.no_product_found') }}</h2>
                                </div>
                            </div>

                            <div class="search-result-bottom" v-if="! emptyProducts">
                                <span class="showing-results" v-text="showingResults"></span>

                                <v-pagination
                                    :total-page="totalPage"
                                    :current-page="queryParams.page"
                                    @page-changed="changePage"
                                    v-if="products.total > queryParams.perPage"
                                >
                                </v-pagination>
                            </div>

                            <div id="description" class="description">
                                {!! $categoryDes !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        @if ($categories->isNotEmpty())
                        <div class="d-none browse-categories-wrap">
                            <h4 class="section-title">
                                {{ trans('storefront::products.browse_categories') }}
                            </h4>

                            @include('public.products.index.browse_categories')
                        </div>
                        @endif
                        <div class="d-none">
                            @include('public.products.index.filter')
                        </div>
                        @include('public.products.index.hot_products')
                    </div>
                </div>
            </div>
        </section>
    </product-index>
@endsection
