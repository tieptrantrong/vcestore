@extends('public.layout')

@section('title', setting('store_tagline'))

@section('content')

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

    <section class="vce-cer-hot">
        <certification-category
        initial-category-slug="top-certifications"
        inline-template
        >
            <div class="container">
                <h1 class="home-title">TOP CERTIFICATIONS</h1>
                <div class="grid-view-products">
                    <home-product-card-grid-view v-for="product in products.data" :key="product.id" :product="product"></home-product-card-grid-view>
                </div>       
            </div>
        
        </certification-category>
    </section>

    <section class="vce-exam-hot">
        <certification-category
        initial-category-slug="top-certifications"
        inline-template
        >
            <div class="container">
                <h1 class="home-title">TOP 50 PRACTICE EXAMS</h1>
                <home-product-table-view :products="products" :is_certificate="true"></home-product-table-view>
            </div>
        
        </certification-category>
    </section>


    @includeUnless(is_null($slider), 'public.home.sections.slider')

    @if (setting('storefront_features_section_enabled'))
        <home-features :features="{{ json_encode($features) }}"></home-features>
    @endif

    @if (setting('storefront_featured_categories_section_enabled'))
        <featured-categories-table :data="{{ json_encode($featuredCategories) }}"></featured-categories-table>
    @endif

    @if (setting('storefront_three_column_full_width_banners_enabled'))
        <banner-three-column-full-width :data="{{ json_encode($threeColumnFullWidthBanners) }}"></banner-three-column-full-width>
    @endif

    @if (setting('storefront_product_tabs_1_section_enabled'))
        <product-tabs-one :data="{{ json_encode($productTabsOne) }}"></product-tabs-one>
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
