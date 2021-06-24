@extends('public.layout')

@section('title', setting('store_tagline'))

@section('content')


    @includeUnless(is_null($slider), 'public.home.sections.slider')

    <section class="vce-welcome">
        <div class="container">
            <h1 class="home-title">Pass Your Next Certification Exam Fast</h1>
            <div class="h3">
                <p>Real IT Certification IT Certification Practice Tests. Instant Download</p>
                <p>Accurate &amp; Verified Exam Questions &amp; Answers by IT Experts, 99.6% Exam Pass Rate</p>
                <p>15 years in the business, more than 1.2M happy customers.</p>
            </div>
        </div>
    </section>

    @if (setting('storefront_features_section_enabled'))
        <home-features :features="{{ json_encode($features) }}"></home-features>
    @endif
    @if (setting('storefront_top_certifications_section_enabled'))
        <home-top-certifications :data="{{ json_encode($topCertifications) }}"></home-top-certifications>
    @endif

    <div class="container v-practice-exam">
        <div class="row">
            <div class="col products-left">
                <div class="custom-page-content clearfix">
                
                    <section class="vce-exam-hot">
                        <certification-category
                        initial-category-slug="top-certifications"
                        inline-template
                        >
                            @if (setting('storefront_top_practice_exams_section_enabled'))
                                <home-product-table-view :title="{{ json_encode($topPracticeExams) }}"></home-product-table-view>
                            @endif
                        
                        </certification-category>
                    </section>
                </div>
            </div>
            <div class="right-sidebar col-lg-5 col-xl-5">
                @include('public.layout.right_sidebar')
            </div>
        </div>
    </div>

    

    @if (setting('storefront_featured_categories_section_enabled'))
        <featured-categories :data="{{ json_encode($featuredCategories) }}"></featured-categories>
    @endif

    @if (setting('storefront_three_column_full_width_banners_enabled'))
        <banner-three-column-full-width :data="{{ json_encode($threeColumnFullWidthBanners) }}"></banner-three-column-full-width>
    @endif

    @if (setting('storefront_top_brands_section_enabled') && $topBrands->isNotEmpty())
        <top-brands :top-brands="{{ json_encode($topBrands) }}"></top-brands>
    @endif

    @if (setting('storefront_flash_sale_and_vertical_products_section_enabled'))
        <flash-sale-and-vertical-products :data="{{ json_encode($flashSaleAndVerticalProducts) }}"></flash-sale-and-vertical-products>
    @endif

    @if (setting('storefront_two_column_banners_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners) }}"></banner-two-column>
    @endif

    @if (setting('storefront_product_grid_section_enabled'))
        <product-grid :data="{{ json_encode($productGrid) }}"></product-grid>
    @endif

    @if (setting('storefront_three_column_banners_enabled'))
        <banner-three-column :data="{{ json_encode($threeColumnBanners) }}"></banner-three-column>
    @endif

    @if (setting('storefront_product_tabs_2_section_enabled'))
        <product-tabs-two :data="{{ json_encode($tabProductsTwo) }}"></product-tabs-two>
    @endif

    @if (setting('storefront_one_column_banner_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner) }}"></banner-one-column>
    @endif
@endsection
