#!/usr/bin/env bash
php ../../vendor/propel/propel/bin/propel sql:build --connection="test" --config-dir="../../orm" --schema-dir="../../orm/schemas/test" --output-dir="../../orm/sql/test" --overwrite
