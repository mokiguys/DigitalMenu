<?php


namespace App\Http\Controllers\admin;


trait StringWorker
{
    public function ConvertArrayToString($text, $separator)
    {
        $exportName = "";
        foreach ($text as $txt) {
            $exportName .= $txt . $separator;
        }
        $exportName = rtrim($exportName, $separator);
        return $exportName;
    }
}
