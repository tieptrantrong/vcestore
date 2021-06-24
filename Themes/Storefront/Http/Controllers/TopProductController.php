<?php

namespace Themes\Storefront\Http\Controllers;

class TopProductController extends ProductIndexController
{
    /**
     * Display a listing of the resource.
     *
     * @param int $tabNumber
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getProducts("storefront_product_top_certifications");
    }

    public function topPracticeExams()
    {
        return $this->getProducts("storefront_product_top_practice_exams");
    }
}