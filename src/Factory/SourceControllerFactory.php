<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Apigility\Admin\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF\Apigility\Admin\Controller\SourceController;
use ZF\Apigility\Admin\Model\ModuleModel;

class SourceControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return SourceController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SourceController($container->get(ModuleModel::class));
    }

    /**
     * @param ServiceLocatorInterface $container
     * @param null|string $cName
     * @param null|string $requestedName
     * @return SourceController
     */
    public function createService(ServiceLocatorInterface $container, $cName = null, $requestedName = null)
    {
        if ($container instanceof AbstractPluginManager) {
            $container = $container->getServiceLocator() ?: $container;
        }
        return $this($container, $requestedName ?: SourceController::class);
    }
}
