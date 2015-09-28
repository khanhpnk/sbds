<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\House;
use App\Project;
use IsSaleOption;

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
                ->expired(false)->isSale(IsSaleOption::BAN)->first());
            $view->with('houseRentRecommend', House::orderBy('id', 'desc')
                ->expired(false)->isSale(IsSaleOption::CHO_THUE)->first());
            $view->with('houseProjectRecommend', Project::orderBy('id', 'desc')
                ->expired(false)->first());
        });
    }
}
