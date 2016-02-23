<?php

namespace App\Providers;

use App\Design;
use App\Repositories\Resource\House\SaleTypeOptions;
use Illuminate\Support\ServiceProvider;
use App\House;
use App\Project;

class ViewComposerServiceProvider extends ServiceProvider
{
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
        	$view->with('houseSaleRecommend', House::orderBy('id', 'desc')
                ->isApproved(1)
                //->isExpired(false)
                ->saleType(SaleTypeOptions::BAN)
                ->first());

            $view->with('houseRentRecommend', House::orderBy('id', 'desc')
                ->isApproved(1)
                //->isExpired(false)
                ->saleType(SaleTypeOptions::CHO_THUE)
                ->first());

            $view->with('houseProjectRecommend', Project::orderBy('id', 'desc')
                ->isApproved(1)
                //->isExpired(false)
                ->first());

            $view->with('designRecommend', Design::orderBy('id', 'desc')
                ->first());
        });
    }
}
