#!/usr/bin/env bash
php ../../vendor/propel/propel/bin/propel model:build --config-dir="../../orm" --schema-dir="../../orm/schemas/test" --output-dir="../../orm/classes"
