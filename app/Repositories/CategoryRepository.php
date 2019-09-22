<?php

/**
 * Created by PhpStorm.
 * User: Dwi Randy H
 * Date: 7/17/2019
 * Time: 2:02 PM
 */

namespace App\Repositories;


use App\Models\Category;
use App\Models\Wallpaper;

class CategoryRepository
{
    const PAGE_SIZE = 10;

    public function getAll()
    {
        return Category::all();
    }

    public function getCategories()
    {
        return Category::paginate(self::PAGE_SIZE);
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function getWallpaperById($id)
    {
        return Wallpaper::where('category_id', '=', $id)
            ->paginate(self::PAGE_SIZE);
    }

    public function updateWallpaperCount($categoryId)
    {
        $count = Wallpaper::where('category_id', '=', $categoryId)
            ->count();

        return $category = Category::where('id', '=', $categoryId)
            ->update(['wallpaper_count' => $count]);
    }
}
