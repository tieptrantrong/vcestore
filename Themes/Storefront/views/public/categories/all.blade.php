@extends('public.layout')
@section('breadcrumb')
<li class="active"> Certification Providers</li>
@endsection
@section('content')
<section class="all-brands-wrap">
    <div class="container">
        <div class="row">
            <div class="col products-left">
                <div class="hot-provider all-brands">
                    <h3 class="provider-title">Hot Providers</h3>
                    <div class="all-brands-inner">
                        @foreach ($categories as $category)
                            @if ($category->is_hot)
                                @include('public.categories.component.category', $category)
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="all-provider all-brands">
                    <h3 class="provider-title">All Providers</h3>
                    <div class="all-brands-inner">
                        @foreach ($categories as $category)
                            @include('public.categories.component.category', $category)
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="right-sidebar col-lg-5 col-xl-5">
                @include('public.layout.right_sidebar')
            </div>
        </div>
    </div>
</section>

@endsection