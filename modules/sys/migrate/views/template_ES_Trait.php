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

            return $this;

        } else {

            return $this;
        }
    }
    //<<<setInitFunctions>>>


  //>>>setModelInitFunctions<<<
  public function modelUcObjTableP()
  {
    if(validate_modulo('lcMod','lcTableP')){

      return Model_UcTableP::create();

    }
  }
  //<<<setModelInitFunctions>>>
}
