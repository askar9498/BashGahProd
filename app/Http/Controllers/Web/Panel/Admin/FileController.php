<?php

namespace App\Http\Controllers\Web\Panel\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Services\File\FileManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function App\Http\Controllers\Web\Admin\response;

class FileController extends Controller
{
    public function store(Request $request, FileManager $fm): JsonResponse
    {
        $request->validate([
            'file' => 'required|max:480000|mimes:doc,docx,pdf,zip,png,jpeg,jpg,csv,xlsx',
            'directory' => 'required',
        ]);

        $file = $request->file('file');
        $file_uploaded = $fm->upload([$file], $request->input('directory'));

        return new JsonResponse(['file' => $file_uploaded]);
    }

    /**
     * @param File $file
     * @param FileManager $fm
     * @return Response
     */
    public function destroy(File $file, FileManager $fm): Response
    {
        $fm->delete([$file->id]);

        return response()->noContent();
    }
}
