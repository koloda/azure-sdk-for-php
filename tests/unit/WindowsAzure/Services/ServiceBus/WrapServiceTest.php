<?php

/**
 * Unit tests for the SDK
 *
 * PHP version 5
 *
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package    Tests\Unit\WindowsAzure\Services\Queue
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\ServiceBus;

use WindowsAzure\Services\Core\Models\ServiceProperties;
use Tests\Framework\TestResources;
use Tests\Framework\WrapRestProxyTestBase;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Core\ServiceException;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Services\ServiceBus\WrapRestProxy;
use WindowsAzure\Services\ServiceBus\WrapService;
use WindowsAzure\Services\ServiceBus\ServiceBusSettings;
use WindowsAzure\Resources;

/**
 * Unit tests for WrapService class
 *
 * @package    Tests\Unit\WindowsAzure\Services\ServiceBus
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class WrapServiceTest extends \PHPUnit_Framework_TestCase
{
    /** 
     * @covers WindowsAzure\Services\ServiceBus\WrapService::create
     */
    public function testWrapServiceCreate() 
    {
        $wrapUri = 'https://'
            .TestResources::serviceBusNamespace()
            .'-sb.accesscontrol.windows.net';

        $wrapName = TestResources::wrapAuthenticationName();
        $wrapPassword = TestResources::wrapPassword();
        
        $config = new Configuration();
        $config->setProperty(ServiceBusSettings::WRAP_URI, $wrapUri);
        $config->setProperty(ServiceBusSettings::WRAP_NAME, $wrapName);
        $config->setProperty(ServiceBusSettings::WRAP_PASSWORD, $wrapPassword);
        
        $wrapRestProxy = WrapService::create($config);
        
        $this->assertNotNull($wrapRestProxy);
        $this->assertInstanceOf('\WindowsAzure\\Services\\ServiceBus\\WrapRestProxy', $wrapRestProxy);
    }
    
}

?>
