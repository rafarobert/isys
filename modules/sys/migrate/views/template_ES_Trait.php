<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

trait ES_Table_Trait
{
    //>>>setInitFunctions<<<
    public function initUcObjTableP($both = false, $bWithInit = false)
    {
        if(validate_modulo('lcMod','lcTableP')){

            if ($both) {
                $this->ctrl_lcTableP = Ctrl_UcTableP::create($bWithInit);
            }
            $this->model_lcTableP = Model_UcTableP::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    //<<<setInitFunctions>>>
}