<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class ES_Config
{
  //>>>setInitFunctions<<<
  public static function configUcObjItem()
  {
    return config_item('lcItem');
  }
  //<<<setInitFunctions>>>
}
