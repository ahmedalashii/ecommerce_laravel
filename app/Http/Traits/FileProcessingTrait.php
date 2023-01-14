<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileProcessingTrait
{
    public function update_file(Request $request, $old_image_link, $input_name, $path)
    {
        $picture_link = $old_image_link;
        if ($request->hasFile($input_name)) {
            // Deleting Old Image Then Replacing it with the new one:
            Storage::disk('public')->delete($old_image_link);
            // Getting the file uploaded:
            $picture = $request->file($input_name);
            $picture_link =  $picture->store($path, ['disk' => 'public']);
        }
        return $picture_link;
    }
}
