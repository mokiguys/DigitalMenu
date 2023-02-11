<?php


namespace App\Http\Controllers\admin;


use Illuminate\Support\Facades\File;

trait Uploader
{
    public function FileUploader($file, $path)
    {
        $imageName = time() . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $imageName);
        return $imageName;
    }

    public function FileDelete($path)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }

    public function FileUpdate($InputImage, $DbImage, $path)
    {
        if ($InputImage != '') {
            if ($DbImage != '' && $DbImage != null) {
                $file_old = $path . $DbImage;
                $this->FileDelete($file_old);
            }
            $file_name = $InputImage;
            $file = $this->FileUploader($file_name, $path);
        } else {
            $file = $DbImage;
        }
        return $file;
    }
}
