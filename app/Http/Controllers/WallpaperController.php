<?php

namespace App\Http\Controllers;

use App\Repositories\WallpaperRepository;

class WallpaperController extends Controller
{
    private $wallpaperItemRepository;

    /**
     * Create a new controller instance.
     *
     * @param WallpaperRepository $wallpaperItemRepository
     */
    public function __construct(WallpaperRepository $wallpaperItemRepository)
    {
        $this->wallpaperItemRepository = $wallpaperItemRepository;
    }

    public function wallpaperItems(){
        return $this->wallpaperItemRepository->getWallpaperItemWithPagination();
    }

    public function popularWallpaper(){
        return $this->wallpaperItemRepository->getPopularWallpaper();
    }

    public function addWallpaperView($id){
        return $this->wallpaperItemRepository->addDownload($id);
    }

    public function addWallpaperDownload($id){
        return $this->wallpaperItemRepository->addView($id);
    }
}
