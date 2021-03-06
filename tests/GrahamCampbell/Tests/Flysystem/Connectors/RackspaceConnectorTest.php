<?php

/**
 * This file is part of Laravel Flysystem by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GrahamCampbell\Tests\Flysystem\Classes;

use Mockery;
use GrahamCampbell\Flysystem\Connectors\RackspaceConnector;
use GrahamCampbell\TestBench\Classes\AbstractTestCase;

/**
 * This is the rackspace connector test class.
 *
 * @package    Laravel-Flysystem
 * @author     Graham Campbell
 * @copyright  Copyright 2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-Flysystem/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-Flysystem
 */
class RackspaceConnectorTest extends AbstractTestCase
{
    public function testConnect()
    {
        $connector = $this->getRackspaceConnector();

        $return = null;

        try {
            $connector->connect(array(
                'endpoint'  => 'https://lon.identity.api.rackspacecloud.com/v2.0/',
                'username'  => 'your-username',
                'password'  => 'your-password',
                'container' => 'your-container'
            ));
        } catch (\Exception $e) {
            $return = $e;
        }

        $this->assertInstanceOf('Guzzle\Http\Exception\ClientErrorResponseException', $return);
    }

    public function testConnectWithoutAuth()
    {
        $connector = $this->getRackspaceConnector();

        $return = null;

        try {
            $connector->connect(array(
                'endpoint'  => 'https://lon.identity.api.rackspacecloud.com/v2.0/',
                'container' => 'your-container'
            ));
        } catch (\Exception $e) {
            $return = $e;
        }

        $this->assertInstanceOf('InvalidArgumentException', $return);
    }

    public function testConnectWithoutConfig()
    {
        $connector = $this->getRackspaceConnector();

        $return = null;

        try {
            $connector->connect(array(
                'username'  => 'your-username',
                'password'  => 'your-password'
            ));
        } catch (\Exception $e) {
            $return = $e;
        }

        $this->assertInstanceOf('InvalidArgumentException', $return);
    }

    protected function getRackspaceConnector()
    {
        return new RackspaceConnector();
    }
}
