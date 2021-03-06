<?php

namespace Modules\Media\Entities;

use Modules\Media\IconResolver;
use Modules\User\Entities\User;
use Modules\Media\Admin\MediaTable;
use Modules\Support\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be visible in serialization.
     *
     * @var array
     */
    protected $visible = ['id', 'filename', 'path'];

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleted(function ($file) {
            Storage::disk($file->disk)->delete($file->getOriginal('path'));
        });
    }

    /**
     * Get the user that uploaded the file.
     *
     * @return void
     */
    public function uploader()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the file's path.
     *
     * @param string $path
     * @return string|null
     */
    public function getPathAttribute($path)
    {
        if (! is_null($path)) {
            return Storage::disk($this->disk)->url($path);
        }
    }

    /**
     * Get the file's path.
     *
     * @param string $path
     * @return string|null
     */
    public function getFilePath()
    {
        if (Storage::disk($this->disk)->exists($this->getAttributes()['path'])) {
            return storage_path($this->disk) . '/' . $this->getAttributes()['path'];
        }
        return null;
    }

    public function product()
    {

    }

    /**
     * Determine if the file type is image.
     *
     * @return bool
     */
    public function isImage()
    {
        return strtok($this->mime, '/') === 'image';
    }

    /**
     * Determine if the file type is image.
     *
     * @return bool
     */
    public function isVce()
    {
        return $this->extension === 'vce';
    }

    /**
     * Get the file's icon.
     *
     * @return string
     */
    public function icon()
    {
        return IconResolver::resolve($this->mime);
    }

    /**
     * Get table data for the resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function table($request)
    {
        if($request->product !== 'null' && $request->product) {
            $query = $this->newQuery()
            ->when(! is_null($request->type) && $request->type !== 'null', function ($query) use ($request) {
                $query->where('mime', 'LIKE', "{$request->type}/%")->where('path', 'LIKE', "vces/{$request->product}/%");
            });
        } else {
            $query = $this->newQuery()
            ->when(! is_null($request->type) && $request->type !== 'null', function ($query) use ($request) {
                $query->where('mime', 'LIKE', "{$request->type}/%");
            });
        }

        return new MediaTable($query);
    }
}
