<?php

namespace App\Http\Controllers;
use App\Services\File\FileManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FileController extends Controller{
    public function store(Request $request,FileManager $fm): JsonResponse
    {
        $request->validate([
            'file' => 'required|max:480000|mimes:doc,docx,pdf,zip,png,jpeg,jpg,xlsx',
            'directory' => 'required',
        ]);

        $file = $request->file('file');
        $file_uploaded = $fm->upload([$file],$request->input('directory'));

        return new JsonResponse(['file'=>$file_uploaded]);
    }
}
