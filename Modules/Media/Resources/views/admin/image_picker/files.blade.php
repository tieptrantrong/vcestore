<div class="multiple-images-wrapper">
    <h4>{{ $title }}</h4>

    <button type="button" class="vce-picker btn btn-default" data-input-name="{{ $inputName }}" data-multiple>
        <i class="fa fa-folder-open m-r-5"></i>{{ trans('media::media.browse') }}
    </button>

    <div class="multiple-files public-resources">
        <ul class="file-list">
            @foreach ($files as $file)
                <li class="public-resource">{{ $file->filename }}
                    <button type="button" class="close remove-public-resource" data-input-name="{{ $inputName }}">&times;</button>
                    <input type="hidden" name="{{ $inputName }}" value="{{ $file->id }}">
                </li>
            @endforeach
        </ul>
    </div>
</div>
