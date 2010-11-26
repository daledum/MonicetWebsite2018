<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserPermissionPeer.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUserPermissionPeer extends PluginsfGuardUserPermissionPeer
{
  public static function getPermissao($user_id){
        $c = new Criteria();
        $c->add(sfGuardUserPermissionPeer::USER_ID, $user_id);
        $c->addAscendingOrderByColumn(sfGuardUserPermissionPeer::PERMISSION_ID);
        $c->setLimit(1);
        return sfGuardUserPermissionPeer::doSelect($c);
  }
}
