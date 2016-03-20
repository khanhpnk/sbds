<?php

namespace App\Providers;

use App\Repositories\Resource\House\SaleTypeOptions;
use Illuminate\Support\ServiceProvider;
use App\House;
use App\Project;
use App\Design;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * @var House
     */
    private $houseModel;

    /**
     * @var Project
     */
    private $projectModel;

    /**
     * @var Design
     */
    private $designModel;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->houseModel = new House();
        $this->projectModel = new Project();
        $this->designModel = new Design();
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->composeSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * Hiển thị 10 bài viết mới nhất ở sidebar (layout)
     *
     * @return void
     */
    public function composeSidebar()
    {
        view()->composer('_sidebar', function($view) {

            // recommend
        	$view->with('houseSaleRecommend', $this->houseModel->getHouses()
                ->saleType(SaleTypeOptions::BAN)
                ->first());

            $view->with('houseRentRecommend', $this->houseModel->getHouses()
                ->saleType(SaleTypeOptions::CHO_THUE)
                ->first());

            $view->with('houseProjectRecommend', $this->projectModel->getProjects()->first());

            $view->with('designRecommend', $this->designModel->getDesigns()->first());
        });
    }
}
