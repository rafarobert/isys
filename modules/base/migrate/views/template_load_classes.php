<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 *
 * ctrlProperties
 *
 * modelProperties
 *
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

trait DB_dbName
{
    //>>>setInitFunctions<<<
    public function init_comandas($both = false)
    {
        if ($both) {
            $this->ctrl_comandas = Ctrl_Comandas::create();
        }
        $this->model_comandas = Model_Comandas::create();
    }
    //<<<setInitFunctions>>>
}