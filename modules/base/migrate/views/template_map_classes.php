<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 *
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

trait DB_dbName
{
    //>>>setInitFunctions<<<
    public function init_lcTableP($both = false)
    {
        if ($both) {
            $this->ctrl_lcTableP = Ctrl_UcTableP::create();
        }
        $this->model_lcTableP = Model_UcTableP::create();
    }
    //<<<setInitFunctions>>>
}