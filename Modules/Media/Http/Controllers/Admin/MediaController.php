<?php

namespace Modules\Media\Http\Controllers\Admin;

use Modules\Media\Entities\File;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Media\Http\Requests\UploadMediaRequest;

class MediaController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'media::media.media';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'media::admin.media';

    /**
     * Store a newly created media in storage.
     *
     * @param \Modules\Media\Http\Requests\UploadMediaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadMediaRequest $request)
    {
        $file = $request->file('file');
        $fileHash = str_replace('.' . $file->extension(), '', $file->hashName());
        $fileName = $fileHash . '.' . $file->getClientOriginalExtension();
        $path = '';
        $disk = '';
        if ($file->getClientOriginalExtension() === 'vce') {
            $path = Storage::disk('private_storage')->putFileAs('vces', $file, $fileName);
            $disk = 'private_storage';
        } else {
            $path = Storage::putFileAs('media', $file, $fileName);
            $disk = config('filesystems.default');
        }
        $mime = $file->getClientOriginalExtension() === 'vce' ? 'vce/octet-stream' : $file->getClientMimeType();
        return File::create([
            'user_id' => auth()->id(),
            'disk' => $disk,
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'extension' => $file->getClientOriginalExtension() ?? '',
            'mime' => $mime,
            'size' => $file->getSize(),
        ]);
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param string $ids
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        File::find(explode(',', $ids))->each->delete();
    }
}
