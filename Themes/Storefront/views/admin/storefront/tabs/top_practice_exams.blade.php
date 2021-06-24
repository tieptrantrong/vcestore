<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('storefront_top_practice_exams_section_enabled', trans('storefront::attributes.section_status'), trans('storefront::storefront.form.enable_top_practice_exams_section'), $errors, $settings) }}

        <div class="clearfix"></div>

        <div class="box-content clearfix">
            <h4 class="section-title">{{ trans('storefront::storefront.form.top_practice_exams') }}</h4>
            {{ Form::text('translatable[storefront_top_practice_exams_section_tab_title]', trans('storefront::attributes.title'), $errors, $settings) }}
            @include('admin.storefront.tabs.partials.products', [
                'fieldNamePrefix' => 'storefront_product_top_practice_exams',
                'products' => $topPracticeExams,
            ])
        </div>
    </div>
</div>
