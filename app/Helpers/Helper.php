<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class Helper {
    public static function generateSlug($model, $slug, $column = 'slug') {
        $temp_slug = Str::slug($slug);
        $results = $model::where($column, $temp_slug)->get();

        if (empty(count($results))) {
            return $temp_slug;
        }

        if (!empty(count($results))) {
            $i = 1;
            while (TRUE) {
                $temp_slug = Str::slug($slug) . '-' . $i;
                $results = $model::where($column, $temp_slug)->get();
                if (empty(count($results))) {
                    return $temp_slug;
                }
                $i++;
            }
        }
    }

    public static function toastrMessage($case = '', $message = '', $is_validation_failed = FALSE) {
        $toastrMessage = '';
        $type = 'success';
        switch ($case) {
            case 'store' :
                $toastrMessage = 'Added Successfully';
                break;
            case 'update' :
                $toastrMessage = 'Updated Successfully';
                break;
            case 'destroy' :
            case 'forceDelete' :
                $toastrMessage = 'Deleted Successfully';
                break;
            case 'restore' :
                $toastrMessage = 'Restored Successfully';
                break;
        }

        if ($is_validation_failed == TRUE) {
            $type = 'error';
            $toastrMessage = 'Snap. One or more fields are required...';
        }

        if (!empty($message)) {
            $toastrMessage = $message;
        }

        self::showToastr($type, $toastrMessage);
    }

    public static function showToastr($type, $message) {
        Session::flash($type, $message);
    }

    public static function convertArrayToObject($array) {
        $collection = collect();
        if (!empty($array)) {
            foreach ($array as $item) {
                $object = (object)$item;
                $collection->push($object);
            }
        }

        return $collection;
    }
}
