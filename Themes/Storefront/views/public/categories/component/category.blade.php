<div class="col-lg-3 col-md-6 col-9 category-item">
    <a href="{{ $category->url() }}" class="brand-image">
        <div class="imgWrap"><img src="{{$category->logo->path}}" alt="brand image"></div>
        <div class="title">{{$category->name}}</div>
        <div class="name">{{$category->products()->where('is_certificate', '=', false)->count()}} exams</div>                        
    </a>
</div>