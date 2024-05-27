<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait {
    public function storageTraitUpload(Request $request, $fieldName, $folderName) {
        if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
            $file = $request->file($fieldName);
            $fileName = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension(); 
            $path = $file->storeAs('public/' . rtrim($folderName, '/'), $fileNameHash);

            $dataUploadTrait = [
                'file_name' => $fileName,
                'file_path' => Storage::url($path)
            ];    

            return $dataUploadTrait;
        }

        return null;
    }

    public function uploadMutiple($file, $folderName) {
        if ($file->isValid()) {
            $fileName = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension(); 
            $path = $file->storeAs('public/' . rtrim($folderName, '/'), $fileNameHash);

            $dataUploadTrait = [
                'file_name' => $fileName,
                'file_path' => Storage::url($path)
            ];    

            return $dataUploadTrait;
        }

        return null;
    }
}
?>
