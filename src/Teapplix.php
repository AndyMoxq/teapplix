<?php
namespace ThankSong\Teapplix;
use ThankSong\Teapplix\Request\GetProductsRequest;
use ThankSong\Teapplix\Response\GetProductsResponse;
use ThankSong\Teapplix\Request\CreateProductsRequest;
use ThankSong\Teapplix\Response\CreateProductsResponse;
use ThankSong\Teapplix\Request\DeleteProductsRequest;
use ThankSong\Teapplix\Response\DeleteProductsResponse;
use ThankSong\Teapplix\Request\EditProductComboRequest;
use ThankSong\Teapplix\Response\EditProductComboResponse;


/**
 * Class Teapplix
 * 
 * 用于静态方式获取Teapplix相关接口数据。
 */
class Teapplix
{
    public static function getProducts(int $page = 1, int $size = 100, string $teapplix_sku = null): GetProductsResponse{
        $request = new GetProductsRequest();
        $request -> setPage($page) -> setPageSize($size);
        if($teapplix_sku !== null){
            $request -> setTeapplixSku($teapplix_sku);
        }
        return GetProductsResponse::fromArray($request -> get());
    }

    public static function createProduct(array $product_data): CreateProductsResponse{
        $request = new CreateProductsRequest();
        $request -> addProduct($product_data);
        return CreateProductsResponse::fromArray($request -> post());
    }

    public static function createProducts(array $products_data): CreateProductsResponse{
        $request = new CreateProductsRequest();
        foreach($products_data as $product_data){
            $request -> addProduct($product_data);
        }
        return CreateProductsResponse::fromArray($request -> post());
    }

    public static function deleteProduct(string $teapplix_sku): DeleteProductsResponse{
        $request = new DeleteProductsRequest();
        $request -> setSku($teapplix_sku);
        return DeleteProductsResponse::fromArray($request -> delete());
    }

    public static function deleteProducts(array $teapplix_skus): DeleteProductsResponse{
        $request = new DeleteProductsRequest();
        $request -> setSkuList($teapplix_skus);
        return DeleteProductsResponse::fromArray($request -> delete());
    }

    public static function editComboProduct(array $combo_product): EditProductComboResponse{
        $request = new EditProductComboRequest();
        $request -> setComboProudct($combo_product);
        return EditProductComboResponse::fromArray($request -> put());
    }
}