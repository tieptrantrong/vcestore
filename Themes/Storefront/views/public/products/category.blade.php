@extends('public.layout')

@section('title')
{{$categoryName}}
@endsection

@push('globals')
    <script>
        FleetCart.langs['storefront::products.showing_results'] = '{{ trans("storefront::products.showing_results") }}';
        FleetCart.langs['storefront::products.show_more'] = '{{ trans("storefront::products.show_more") }}';
        FleetCart.langs['storefront::products.show_less'] = '{{ trans("storefront::products.show_less") }}';
    </script>
@endpush

@section('breadcrumb')
    {!! $categoryBreadcrumb !!}

    <li class="active">{{ $categoryName }}</li>
@endsection

@section('content')
    <product-category
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
                        <div class="search-result">
                            <div class="search-result-top">
                                <div class="content-left category-title">
                                    <h2 class="h2">Pass {{$categoryName}} Certifications Exam in First Attempt Easily</h2>
                                    <h3 class="h3">Real {{$categoryName}} Certification Exam Dumps, Practice Test Questions, <br> Accurate &amp; Verified Answers As Experienced in the Actual Test!</h3>
                                </div>
                            </div>

                            <div class="category-tab clearfix">
                                <ul class="nav nav-tabs tabs">
                                    <li class="nav-item">
                                        <a href="#category-exams" data-toggle="tab" class="nav-link" :class="{ active: activeTab === 'category-exams' }">
                                            <div class="border"></div>
                                            {{ $categoryName . ' Exams'}}
                                        </a>
                                    </li>
    
                                    <li class="nav-item">
                                        <a href="#category-certificates" data-toggle="tab" class="nav-link" :class="{ active: activeTab === 'category-certificates' }">
                                            <div class="border"></div>
                                            {{ $categoryName . ' Certifications'}}
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#category-description" data-toggle="tab" class="nav-link" :class="{ active: activeTab === 'category-description' }">
                                            <div class="border"></div>
                                            {{ 'About ' . $categoryName }}
                                        </a>
                                    </li>
                                </ul>
    
                                <div class="tab-content category-content">
                                    @include('public.products.category.tab_exams')
                                    @include('public.products.category.tab_certificates')
                                    @include('public.products.category.tab_description')
                                </div>
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
                        @include('public.layout.right_sidebar')
                    </div>
                </div>
            </div>
        </section>
    </product-category>
@endsection
