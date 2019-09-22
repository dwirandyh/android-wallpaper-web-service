<?php

/**
 * Created by PhpStorm.
 * User: Dwi Randy H
 * Date: 7/17/2019
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;


use App\Repositories\CategoryRepository;
use App\Repositories\WallpaperRepository;

class UpdateController extends Controller
{
    private $categoryRepository;
    private $wallpaperRepository;

    public function __construct(CategoryRepository $categoryRepository, WallpaperRepository $wallpaperRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->wallpaperRepository = $wallpaperRepository;
    }

    public function doUpdate()
    {
        $this->updateCategoryInformation();
        $this->updateWallpaperInformation();
    }

    public function updateCategoryInformation()
    {
        $categories = $this->categoryRepository->getAll();

        foreach ($categories as $category) {
            $this->categoryRepository->updateWallpaperCount($category->id);
        }
    }

    public function updateWallpaperInformation()
    {
        $wallpapers = $this->wallpaperRepository->getAll();

        foreach ($wallpapers as $wallpaper) {
            $parent_dir = dirname(dirname($_SERVER['SCRIPT_FILENAME'])) . '/';
            $imagePath = $parent_dir . 'public/images/wallpaper/' . $wallpaper->file_name;
            $metaData = $this->getImageMetaData($imagePath);
            $this->wallpaperRepository->updateMetaData($wallpaper->id, $metaData);
        }
    }

    private function getImageMetaData($path)
    {
        list($width, $height) = getimagesize($path);

        $fileSize = filesize($path);

        return [
            'resolution' => $width . 'x' . $height,
            'file_size' => $fileSize
        ];
    }
}
