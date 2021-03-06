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
use GrahamCampbell\Flysystem\Connectors\SftpConnector;
use GrahamCampbell\TestBench\Classes\AbstractTestCase;

/**
 * This is the sftp connector test class.
 *
 * @package    Laravel-Flysystem
 * @author     Graham Campbell
 * @copyright  Copyright 2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-Flysystem/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-Flysystem
 */
class SftpConnectorTest extends AbstractTestCase
{
    public function testConnect()
    {
        $connector = $this->getSftpConnector();

        $return = $connector->connect(array(
            'host' => 'sftp.example.com',
            'port' => 22,
            'username' => 'your-username',
            'password' => 'your-password'
        ));

        $this->assertInstanceOf('League\Flysystem\Adapter\Sftp', $return);
    }

    protected function getSftpConnector()
    {
        return new SftpConnector();
    }
}
