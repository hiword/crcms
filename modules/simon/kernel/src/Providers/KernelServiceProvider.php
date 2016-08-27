<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/20
 * Time: 20:01
 */
namespace Simon\Kernel\Providers;
use Simon\Kernel\Providers\PackageServiceProvider;
use Illuminate\Support\ServiceProvider;
use Simon\User\Repositorys\AuthLogRepository;
use Simon\User\Repositorys\Interfaces\AuthLogRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserMailCodeRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Repositorys\UserMailCodeRepository;
use Simon\User\Repositorys\UserRepository;
use Simon\User\Services\AuthLogService;
use Simon\User\Services\Interfaces\AuthLogInterface;
use Simon\User\Services\Interfaces\MailCodeInterface;
use Simon\User\Services\Interfaces\RegisterInterface;
use Simon\User\Services\Interfaces\UserAuthInterface;
use Simon\User\Services\Interfaces\UserMailCodeInterface;
use Simon\User\Services\MailCodeService;
use Simon\User\Services\RegisterService;
use Simon\User\Services\UserAuthService;
use Simon\User\Services\UserMailCodeService;


class KernelServiceProvider extends PackageServiceProvider
{

    protected $defer = false;

    /**
     *
     * @var string
     * @author simon
     */
    protected $namespaceName = 'kernel';

    /**
     *
     * @var string
     * @author simon
     */
    protected $packagePath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;


    /**
     *
     */

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