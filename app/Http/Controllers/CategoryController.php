<?php
/**
 * Created by PhpStorm.
 * User: Dwi Randy H
 * Date: 7/17/2019
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;


use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function categories(){
        return $this->categoryRepository->getCategories();
    }

    public function wallpaperById($id){
        return $this->categoryRepository->getWallpaperById($id);
    }
}