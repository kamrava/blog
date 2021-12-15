<?php

namespace App\Providers;

use App\Facades\CommentRepoFacade;
use App\Http\Responses\AndroidResponse;
use App\Http\Responses\IosResponse;
use App\Http\Responses\VueResponse;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;
use App\Facades\Responder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->repositoriesProxy();
        $this->platformProxy();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

        /**
     * Platform proxy.
     *
     * @return void
     */
    protected function platformProxy()
    {
        switch(request()->header('platform')) {
            case 'android':
                Responder::shouldProxyTo(AndroidResponse::class);
                break;
            case 'ios':
                Responder::shouldProxyTo(IosResponse::class);
                break;
            default:
                Responder::shouldProxyTo(VueResponse::class);
        }
    }

    /**
     * Repositories proxy.
     *
     * @return void
     */

    protected function repositoriesProxy()
    {
        CommentRepoFacade::shouldProxyTo(CommentRepository::class);
    }
}
