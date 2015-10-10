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

namespace OWeb\db\module\Extension;

use OWeb\types\extension\Extension;
use OWeb\utils\SimpleArray;

abstract class AbstractConnection extends Extension{

    /** @var SimpleArray */
    protected $connections;
    protected $prefix;

    protected function init() {
    }

    protected function ready()
    {
    }

    /**
     * @param string $name
     *   The name of the connection to get. (Usefull if using write/read connection or multi databases.
     *
     * @return mixed
     *   The connection to the database.
     */
    abstract public function getConnection($name = 'main');

    /**
     * Get the prefix of the table names (Some schemas may simply not use this)
     *
     * @return string
     *    The prefix.
     */
    public function getPrefix(){
        return $this->prefix;
    }

}