<?php

namespace Modules\Media\Http\Controllers;

use Modules\Media\Entities\File;
use Modules\Product\Entities\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Order\Entities\Order;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::user()->hasProduct($product_id) && ($file->extension == 'vce' || $file->extension == 'pdf')) {
                $filePath = $file->getFilePath();
                if ($filePath) {
                    return Response::download($filePath, $file->filename);
                }
            }
        }
        else if ($product->hasPublicResource($resource_id)) {
            if ($file->extension == 'vce' || $file->extension == 'pdf') {
                $filePath = $file->getFilePath();
                if ($filePath) {
                    return Response::download($filePath, $file->filename);
                }
            }
        }
        return abort(404);
    }

}
