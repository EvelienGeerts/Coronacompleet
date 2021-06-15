<?php

require_once ( __DIR__ . '\..\Models\Product.php' );
class ProductController
{
    public function view(int $index)
    {
        //initialiseerd de RenderView class.
        $view = new RenderView('Product/View');
        $product = Product::getByID($index);
        $url = "img/product/" . $product->ID . "/*";
        $images = glob($url);

        $view->set('product', $product);
        $view->set('images', $images);
        $view->set('imagecount', count($images));
        $view->render();
    }

    public function overview()
    {
        $view = new RenderView('Product/Overview');
        $products = Product::getAll();
        $view->set('products', $products);

        $view->render();
    }
}