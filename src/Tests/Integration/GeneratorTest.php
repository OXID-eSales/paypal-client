<?php

/**
 * This file is part of OXID eSales Paypal module.
 *
 * OXID eSales Paypal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Paypal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Paypal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace Paypal\Tests\Unit\Core;

use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    public function testAllPropertiesGenerated()
    {
        $schemaDir = __DIR__ . '/../../../../../custom/paypal-client/schema';

        $schemas = scandir($schemaDir);

        foreach ($schemas as $schema) {
            if ($schema === '..' | $schema === '.') {
                continue;
            }

            if (is_dir($schema)) {
                continue;
            }

            $apiSchema = json_decode(file_get_contents($schemaDir . '/' . $schema), true);

            if (!$apiSchema) {
                continue;
            }

            if (!array_key_exists('definitions', $apiSchema)) {
                continue;
            }

            foreach ($apiSchema['definitions'] as $fileName => $api) {
                if (!array_key_exists('type', $api)) {
                    continue;
                }

                if ($api['type'] === 'object') {
                    $properties = $api['properties'];

                    if (strstr($fileName, 'CommonComponentsSpecification')) {
                        $fileNameNameArray = explode('/', $fileName);
                        $fileName = end($fileNameNameArray);
                    }

                    $fileNameArray = explode('-', $fileName);

                    $fileNameComplete = '';
                    foreach ($fileNameArray as $fileNamePart) {
                        $fileNameComplete .= ucfirst($fileNamePart);
                    }

                    if (empty($fileNameComplete)) {
                        $fileNameComplete = $fileName;
                    }

                    $filePath = __DIR__ . '/../../../generated/Model/' .
                        str_replace('.json', '', $schema) . '/' .
                        ucfirst(str_replace('.json', '', $fileNameComplete)) . '.php';

                    $fileArray = [];
                    if (file_exists($filePath)) {
                        $fileContentArray = explode(PHP_EOL, file_get_contents($filePath));

                        foreach ($fileContentArray as $fileContentLine) {
                            $fileContentLine = trim($fileContentLine);
                            if (empty($fileContentLine)) {
                                continue;
                            }
                            if (strstr($fileContentLine, '/**')) {
                                continue;
                            }
                            if (strstr($fileContentLine, '*')) {
                                continue;
                            }
                            if (strstr($fileContentLine, 'class')) {
                                continue;
                            }
                            if (strstr($fileContentLine, 'namespace')) {
                                continue;
                            }
                            if (strstr($fileContentLine, 'function')) {
                                continue;
                            }
                            if (strstr($fileContentLine, '<?php')) {
                                continue;
                            }
                            if (strstr($fileContentLine, 'use ')) {
                                continue;
                            }
                            if (strstr($fileContentLine, '{')) {
                                continue;
                            }
                            if (strstr($fileContentLine, '}')) {
                                continue;
                            }
                            if (strstr($fileContentLine, '->')) {
                                continue;
                            }
                            if (strstr($fileContentLine, '$this')) {
                                continue;
                            }
                            if (strstr($fileContentLine, ');')) {
                                continue;
                            }
                            if (strstr($fileContentLine, '"')) {
                                continue;
                            }
                            if (strstr($fileContentLine, ',')) {
                                continue;
                            }

                            $fileArray[] = trim($fileContentLine);
                        }

                        $fileArray = array_flip($fileArray);

                        foreach ($properties as $propertyKey => $propertyValue) {
                            $propertyString = 'public $' . $propertyKey . ';';
                            $message = 'file ' . $filePath . ' does not contain' . $propertyString;
                            $this->assertContains($propertyString, $fileArray, $message);
                        }
                    }
                }
            }
        }
    }
}
