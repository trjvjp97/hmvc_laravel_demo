<?php

namespace Core\Providers;

use Core\Modules\ModuleServiceProvider;
use Core\Repositories\BookRepository;
use Core\Repositories\Contracts\BookRepositoryContract;
use Core\Services\BookService;
use Core\Services\Contracts\BookServiceContract;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider{
    public function register()
    {
        $this->app->register(ModuleServiceProvider::class);
        $this->app->bind(BookRepositoryContract::class,BookRepository::class);
        $this->app->bind(BookServiceContract::class,BookService::class);
    }
}
