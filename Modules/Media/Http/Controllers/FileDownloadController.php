<?php

namespace Modules\Media\Http\Controllers;

use Modules\Media\Entities\File;
use Modules\Product\Entities\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileDownloadController
{
    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = File::class;

    public function downloadFile($product_id, $resource_id)
    {
        $product = Product::findOrFail($product_id);
        $file = File::findOrFail($resource_id);
        if (!$product || !$file) {
            return abort(404);
        }
        if ($product->hasPrivateResource($resource_id)) {
            return abort(404);
            if ($file->extension == 'vce') {
                $filePath = $file->getFilePath();
                if ($filePath) {
                    return Response::download($filePath);
                }
            }
        }
        if ($product->hasPublicResource($resource_id)) {
            if ($file->extension == 'vce') {
                $filePath = $file->getFilePath();
                if ($filePath) {
                    return Response::download($filePath);
                }
            }
        }
        return abort(404);
    }

}
