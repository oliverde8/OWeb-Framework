<?php
/**
 * @author      Oliver de Cramer (oliverde8 at gmail.com)
 * @copyright    GNU GENERAL PUBLIC LICENSE
 *                     Version 3, 29 June 2007
 *
 * PHP version 5.3 and above
 *
 * LICENSE: This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see {http://www.gnu.org/licenses/}.
 */

namespace OWeb\settings\module\Model;

use OWeb\OWeb;
use OWeb\settings\module\Extension\Settings;

abstract class Setting{

    private static $instances = array();

    public static function getInstance()
    {
        $class = get_called_class();
        if(!isset(self::$instances[$class]))
        {
            self::$instances[$class] = new $class();
        }
        return self::$instances[$class];
    }

    function __construct()
    {
        /** @var Settings $settingsExt */
        $settingsExt = OWeb::getInstance()->getManageExtensions()->getExtension('OWeb\settings', 'Settings');
        /** @var SimpleXMLElement $settings */
        $settings = $settingsExt->getClassSetting($this);

        if ($settings != null){
            foreach ($settings->children() as $key => $value){
                if (isset($this->$key)) {
                    $children = $value->children();
                    if(empty($children)){
                        $this->$key = (string)$value;
                    }else{
                        $this->$key = $value;
                    }
                }
            }
        }
    }
} 