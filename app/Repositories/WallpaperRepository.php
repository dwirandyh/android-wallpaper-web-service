<?php

/**
 * Created by PhpStorm.
 * User: Dwi Randy H
 * Date: 7/16/2019
 * Time: 10:47 PM
 */

namespace App\Repositories;


use App\Models\Wallpaper;
use Illuminate\Support\Facades\DB;

class WallpaperRepository
{
    const PAGE_SIZE = 20;

    public function getAll()
    {
        return Wallpaper::get();
    }

    public function getWallpaperItemWithPagination()
    {
        return Wallpaper::orderByDesc('created_at')
            ->paginate(self::PAGE_SIZE);
    }

    public function getPopularWallpaper()
    {
        return Wallpaper::orderByDesc('views')
            ->paginate(self::PAGE_SIZE);
    }

    public function addView($id)
    {
        DB::table('wallpapers')->where('id', '=', $id)->increment('views');
        return $this->getDetailById($id);
    }

    public function addDownload($id)
    {
        DB::table('wallpapers')->where('id', '=', $id)->increment('downloads');
        return $this->getDetailById($id);
    }

    public function getDetailById($id)
    {
        return Wallpaper::where('id', '=', $id)->firstOrFail();
    }

    public function updateMetaData($id, $metaData)
    {
        return Wallpaper::where('id', '=', $id)
            ->update($metaData);
    }
}
