<div class=".col-xl-3 col-lg-4 col-md-6 col-9 category-item">
    <a href="{{ $category->url() }}" class="brand-image">
        @if ($category->logo->path != '')
        <div class="imgWrap"><img src="{{$category->logo->path}}" alt="brand image"></div>
        @else
        <div class="title category-title">{{$category->name}}</div>
        @endif
        <div class="category-name">{{$category->products()->where('is_certificate', '=', false)->count()}} exams</div>                        
    </a>
</div>