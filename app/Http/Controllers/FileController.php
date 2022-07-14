<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\File\FileUploadRequest;

class FileController extends Controller
{
    public function uploadFile(FileUploadRequest $request)
    {
        $timestamp = Carbon::now()->timestamp;

        try {
            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $files['name'] = $file->getClientOriginalName();
                $files['extension'] = $file->getClientOriginalExtension();
                $files['filename'] = "{$files['name']}.{$timestamp}.{$files['extension']}";
                Storage::disk('local')->put('files/', $file);
                $files['url'] = "http://localhost:8000";
                //return $files;
                $file = File::create($files);

                return $file->url;
            }
        } catch (\Exception $exception) {
            return response([
                'message' => 'Houve um erro ao tentar fazer o upload do arquivo',
                'description' => $exception->getMessage()
            ], 400);
        }
    }
}
