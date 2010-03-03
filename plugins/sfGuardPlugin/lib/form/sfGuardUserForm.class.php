<?php

/**
 * sfGuardUser form.
 *
 * @package    form
 * @subpackage sf_guard_user
 * @version    SVN: $Id: sfGuardUserForm.class.php 24560 2009-11-30 11:05:31Z fabien $
 */
class sfGuardUserForm extends sfGuardUserAdminForm
{
  public function configure()
  {
    parent::configure();
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('sf_guard_user');
    unset(
      $this['last_login'],
      $this['created_at'],
      $this['salt'],
      $this['algorithm'],
      $this['sf_guard_user_group_list']
      //$this['is_super_admin']
      //$this['is_active'],
      //$this['sf_guard_user_permission_list']
    );
    $sf_guard_user = sfContext::getInstance()->getUser()->getGuardUser();
    if ( ! $sf_guard_user || ! $sf_guard_user->getIsSuperAdmin() ){
    	unset(
    	  $this['is_super_admin'], $this['mf_formulario_utilizador_list']
    	);
    }
    
    mfFormularioPeer::filtrar($this);
  }
  protected function doSave($con = null)
  {
    parent::doSave($con);
    self::$dispatcher->notify(new sfEvent($this->getObject(), 'user.save'));
  }
}
