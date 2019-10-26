<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use JD\Cloudder\Facades\Cloudder;

class UploadController extends Controller
{
    public function upload(UploadRequest $request)
    {
        $image = $request->file('image');

        Cloudder::upload($image->getRealPath(), null);

        return response()->json([
            'image_key' => Cloudder::getPublicId(),
        ]);
    }
}
