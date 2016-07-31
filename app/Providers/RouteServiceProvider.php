<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\House;
use App\Project;
use App\Design;
use App\Article;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * @var House
     */
    private $articleModel;
    
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
        
        $this->articleModel = new Article();
        $this->houseModel = new House();
        $this->projectModel = new Project();
        $this->designModel = new Design();
    }
    private function getArticle() 
    {
        return $this->articleModel;
    }

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->bind('article', function($value) {
            return $this->getArticle()->where('slug', $value)->firstOrFail();
        });
        $router->bind('cong-ty', function($value) {
            return \App\Company::where('slug', $value)->firstOrFail();
        });
        $router->bind('thiet-ke-thi-cong', function($value) {
            return $this->designModel->getDesigns()->where('designs.slug', $value)->firstOrFail();
        });

        $router->bind('house', function($value) {
            return $this->houseModel->getHouses()->where('houses.slug', $value)->firstOrFail();
        });
        $router->bind('company', function($value) {
            return \App\Company::where('slug', $value)->firstOrFail();
        });
        $router->bind('project', function($value) {
            return $this->projectModel->getProjects()->where('projects.slug', $value)->firstOrFail();
        });

        $router->model('owner', 'App\House');
        $router->model('agency', 'App\House');
        $router->model('message', 'App\Message');

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
