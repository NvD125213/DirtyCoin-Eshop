<?php 
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait {
    public function storageTraitUpload($request, $fieldName, $folderName) {
        if($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileName = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension(); 
            $path = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileName,
                'file_path' => Storage::url($path)
    
            ];    
            return $dataUploadTrait;

        }
        return null;
    }

    public function uploadMutiple($file, $folderName) {
        $fileName = $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension(); 
        $path = $file->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
        $dataUploadTrait = [
            'file_name' => $fileName,
            'file_path' => Storage::url($path)
        ];    
        return $dataUploadTrait;
    }

}

?>