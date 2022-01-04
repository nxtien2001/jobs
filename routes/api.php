<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('zip', function () {
    $zip_file = 'invoices.zip';
    $zip = new \ZipArchive();
    $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

    $path = storage_path('app\public\photos\5\users');
    $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
    foreach ($files as $name => $file) {
        // We're skipping all subfolders
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();

            // extracting filename with substr/strlen
            $relativePath = 'invoices/' . substr($filePath, strlen($path) + 1);

            $zip->addFile($filePath, $relativePath);
        }
    }
    $zip->close();
    return response()->download($zip_file);
});
