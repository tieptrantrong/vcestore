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
            $orders = Auth::user()->orders()->get();
            foreach ($orders as $order) {
                if ($order->status == 'completed') {
                    $products = $order->products()->get()->pluck('product_id')->toArray();
                    if (in_array($product_id, $products) && $file->extension == 'vce') {
                        $filePath = $file->getFilePath();
                        if ($filePath) {
                            return Response::download($filePath);
                        }
                    }
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
