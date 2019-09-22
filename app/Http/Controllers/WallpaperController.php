<?php

namespace App\Http\Controllers;

use App\Repositories\WallpaperRepository;

class WallpaperController extends Controller
{
    private $wallpaperRepository;

    /**
     * Create a new controller instance.
     *
     * @param WallpaperRepository $wallpaperItemRepository
     */
    public function __construct(WallpaperRepository $wallpaperRepository)
    {
        $this->wallpaperRepository = $wallpaperRepository;
    }

    public function wallpaperItems()
    {
        return $this->wallpaperRepository->getWallpaperItemWithPagination();
    }

    public function popularWallpaper()
    {
        return $this->wallpaperRepository->getPopularWallpaper();
    }

    public function addWallpaperView($id)
    {
        return $this->wallpaperRepository->addDownload($id);
    }

    public function addWallpaperDownload($id)
    {
        return $this->wallpaperRepository->addView($id);
    }
}
