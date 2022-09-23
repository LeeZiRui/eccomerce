<?php


namespace App\Reporters;


use App\Interfaces\ReportFormaterInterface;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductReporter
{
    protected $repo;
    public function __construct(ProductRepository $productRepository)
    {
        $this->repo = $productRepository;
    }


    public function limit($count , ReportFormaterInterface $formatter)
    {

        $products =  $this->repo->dbLimit($count);

        return $formatter->output( $products );
    }
}
