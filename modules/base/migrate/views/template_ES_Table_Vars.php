<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

if (!function_exists('initStaticTableVars')) {

    function initStaticTableVars($obj)
    {
        //>>>setInitStaticTableVars<<<
        $obj->table_lcAcMod_lcTableP = class_exists('Migration_Create_lcAcMod_lcTableP') ? Migration_Create_lcAcMod_lcTableP::$tableFields : null;
        //<<<setInitStaticTableVars>>>
    }
}