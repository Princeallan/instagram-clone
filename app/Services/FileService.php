<?php

namespace App\Services;

use Image;
class FileService
{
    public function updateFile($model, $request, $type)
    {
        if (!empty($model->file)) {
            $currentFile = public_path() . $model->file;

            if (file_exists($currentFile) && $currentFile != public_path() . '/user-placeholder.png'){
                unlink($currentFile);
            }
        }

        if ($type === 'user') {
            $file = Image::make($request->file('file'))->resize(400, 400);
        } else {
            $file = Image::make($request->file('file'));
        }
        $orig_file = $request->file('file');
        $extension = $orig_file->getClientOriginalExtension();
        $file_name = time() . '.' . $extension;
//        dd(public_path() . '/file/' . $file_name);
        $file->save(public_path() . '/file/' . $file_name);
        $model->file = '/file/' . $file_name;

        return $model;
    }
}
