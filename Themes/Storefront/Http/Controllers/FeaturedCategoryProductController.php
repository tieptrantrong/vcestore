<?php

namespace Themes\Storefront\Http\Controllers;

class FeaturedCategoryProductController extends ProductIndexController
{
    /**
     * Display a listing of the resource.
     *
     * @param int $categoryNumber
     * @return \Illuminate\Http\Response
     */
    public function index($categoryNumber)
    {
        return $this->getProducts("storefront_featured_categories_section_category_{$categoryNumber}");
    }

    public function all($categoryNumber)
    {
        if ($categoryNumber < 1)
            return;
        $all_products = [];
        for ($index = 1; $index <= $categoryNumber; $index++) {
            $all_products[$index - 1] = $this->getProducts("storefront_featured_categories_section_category_{$index}");
        }
        return $all_products;
    }
}
