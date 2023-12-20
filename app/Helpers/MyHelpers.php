<?php

namespace App\Helpers;

use App\Models\Category;

trait MyHelpers
{
    public function slug_generator(string $string, $model)
    {
        $slug = str()->slug($string);
        $count = $model::where('slug', 'LIKE', '%' . $slug . '%')->count();
        if ($count > 0) {
            $count += 1;
            $slug = $slug . '-' . $count;
        } else {
            $slug = $slug;
        }
        return $slug;
    }

    public function image_upload($filed_name, $destination, $type = 'public'){
        $image_name = str()->random(5) . time() . '.' . $filed_name->extension();
        $filed_name->storeAs($destination, $image_name, $type);
        return $image_name;
    }
}
