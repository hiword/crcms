<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/20
 * Time: 20:01
 */
namespace Simon\User\Providers;
use App\Providers\PackageServiceProvider;
use Illuminate\Support\ServiceProvider;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Repositorys\UserRepository;
use Simon\User\Services\Interfaces\RegisterInterface;
use Simon\User\Services\RegisterService;


class UserServiceProvider extends PackageServiceProvider
{

    protected $defer = false;

    /**
     *
     * @var string
     * @author simon
     */
    protected $namespaceName = 'user';

    /**
     *
     * @var string
     * @author simon
     */
    protected $packagePath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;


    /**
     *
     */
    public function register()
    {
        parent::register();

        $this->app->bind(RegisterInterface::class,RegisterService::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
//        return [RegisterInterface::class,UserRepositoryInterface::class];
    }



}