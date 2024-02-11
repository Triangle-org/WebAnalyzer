<?php
/*
 * @package     Localzet WebAnalyzer library
 * @link        https://github.com/localzet/WebAnalyzer
 *
 * @author      Ivan Zorin <creator@localzet.com>
 * @copyright   Copyright (c) 2018-2024 Zorin Projects S.P.
 * @license     https://www.gnu.org/licenses/agpl-3.0 GNU Affero General Public License v3.0
 *
 *              This program is free software: you can redistribute it and/or modify
 *              it under the terms of the GNU Affero General Public License as published
 *              by the Free Software Foundation, either version 3 of the License, or
 *              (at your option) any later version.
 *
 *              This program is distributed in the hope that it will be useful,
 *              but WITHOUT ANY WARRANTY; without even the implied warranty of
 *              MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *              GNU Affero General Public License for more details.
 *
 *              You should have received a copy of the GNU Affero General Public License
 *              along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 *              For any questions, please contact <creator@localzet.com>
 */

include_once __DIR__ . '/bootstrap.php';

use localzet\WebAnalyzer\Data\Applications;

$command = 'list';
$types = [];
$options = [];

array_shift($argv);

if (count($argv)) {
    foreach ($argv as $argument) {
        if ($argument == 'list') {
            $command = $argument;
        } elseif (str_starts_with($argument, '--')) {
            $options[] = substr($argument, 2);
        } else {
            $types[] = $argument;
        }
    }
}

if (in_array('all', $options)) {
    $types = [
        'applications-bots',
        'applications-browsers',
        'applications-others'
    ];
}


foreach ($types as $i => $type) {
    command($command, $type);
}


function command($command, $type)
{
    if ($command == 'list') {
        command_list($type);
    }
}

function command_list($type)
{
    echo "Creating regex for 'data/{$type}.php'...\n";

    require_once __DIR__ . '/../data/' . $type . '.php';

    if ($type == 'applications-bots') {
        $list = Applications::$BOTS;

        $ids = [];

        foreach ($list as $i => $bot) {
            $ids[] = $bot['id'];
        }

        $ids = array_unique($ids);
        $regex = '/(' . implode('|', $ids) . ')/i';

        $file = <<<PHP_INS
 <?php
 /*
  * @package     Localzet WebAnalyzer library
  * @link        https://github.com/localzet/WebAnalyzer
  *
  * @author      Ivan Zorin <creator@localzet.com>
  * @copyright   Copyright (c) 2018-2024 Zorin Projects S.P.
  * @license     https://www.gnu.org/licenses/agpl-3.0 GNU Affero General Public License v3.0
  *
  *              This program is free software: you can redistribute it and/or modify
  *              it under the terms of the GNU Affero General Public License as published
  *              by the Free Software Foundation, either version 3 of the License, or
  *              (at your option) any later version.
  *
  *              This program is distributed in the hope that it will be useful,
  *              but WITHOUT ANY WARRANTY; without even the implied warranty of
  *              MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  *              GNU Affero General Public License for more details.
  *
  *              You should have received a copy of the GNU Affero General Public License
  *              along with this program.  If not, see <https://www.gnu.org/licenses/>.
  *
  *              For any questions, please contact <creator@localzet.com>
  */
 
 /* This file is automatically generated, do not edit manually! */
 
 namespace localzet\WebAnalyzer\Data;
  
 PHP_INS;
        $file .= "Applications::\$BOTS_REGEX = '" . $regex . "';\n";

        file_put_contents(__DIR__ . '/../data/regexes/' . $type . '.php', $file);
    }

    if ($type == 'applications-browsers') {
        $list = Applications::$BROWSERS;

        $ids = [];

        foreach ($list as $t => $l) {
            foreach ($l as $i => $item) {
                $ids[] = $item['id'];
            }
        }

        $ids = array_unique($ids);
        $regex = '/(' . implode('|', $ids) . ')/i';

        $file = <<<PHP_INS
 <?php
 /*
  * @package     Localzet WebAnalyzer library
  * @link        https://github.com/localzet/WebAnalyzer
  *
  * @author      Ivan Zorin <creator@localzet.com>
  * @copyright   Copyright (c) 2018-2024 Zorin Projects S.P.
  * @license     https://www.gnu.org/licenses/agpl-3.0 GNU Affero General Public License v3.0
  *
  *              This program is free software: you can redistribute it and/or modify
  *              it under the terms of the GNU Affero General Public License as published
  *              by the Free Software Foundation, either version 3 of the License, or
  *              (at your option) any later version.
  *
  *              This program is distributed in the hope that it will be useful,
  *              but WITHOUT ANY WARRANTY; without even the implied warranty of
  *              MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  *              GNU Affero General Public License for more details.
  *
  *              You should have received a copy of the GNU Affero General Public License
  *              along with this program.  If not, see <https://www.gnu.org/licenses/>.
  *
  *              For any questions, please contact <creator@localzet.com>
  */
 
 /* This file is automatically generated, do not edit manually! */
 
 namespace localzet\WebAnalyzer\Data;
  
 PHP_INS;
        $file .= "Applications::\$BROWSERS_REGEX = '" . $regex . "';\n";

        file_put_contents(__DIR__ . '/../data/regexes/' . $type . '.php', $file);
    }

    if ($type == 'applications-others') {
        $list = Applications::$OTHERS;

        $ids = [];

        foreach ($list as $t => $l) {
            foreach ($l as $i => $item) {
                $ids[] = $item['id'];
            }
        }

        $ids = array_unique($ids);
        $regex = '/(' . implode('|', $ids) . ')/i';

        $file = <<<PHP_INS
 <?php
 /*
  * @package     Localzet WebAnalyzer library
  * @link        https://github.com/localzet/WebAnalyzer
  *
  * @author      Ivan Zorin <creator@localzet.com>
  * @copyright   Copyright (c) 2018-2024 Zorin Projects S.P.
  * @license     https://www.gnu.org/licenses/agpl-3.0 GNU Affero General Public License v3.0
  *
  *              This program is free software: you can redistribute it and/or modify
  *              it under the terms of the GNU Affero General Public License as published
  *              by the Free Software Foundation, either version 3 of the License, or
  *              (at your option) any later version.
  *
  *              This program is distributed in the hope that it will be useful,
  *              but WITHOUT ANY WARRANTY; without even the implied warranty of
  *              MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  *              GNU Affero General Public License for more details.
  *
  *              You should have received a copy of the GNU Affero General Public License
  *              along with this program.  If not, see <https://www.gnu.org/licenses/>.
  *
  *              For any questions, please contact <creator@localzet.com>
  */
 
 /* This file is automatically generated, do not edit manually! */
 
 namespace localzet\WebAnalyzer\Data;
  
 PHP_INS;
        $file .= "Applications::\$OTHERS_REGEX = '" . $regex . "';\n";

        file_put_contents(__DIR__ . '/../data/regexes/' . $type . '.php', $file);
    }
}
