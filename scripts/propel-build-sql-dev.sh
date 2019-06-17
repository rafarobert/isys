#!/usr/bin/env bash
php ../../vendor/propel/propel/bin/propel sql:build --connection="dev" --config-dir="../../orm" --schema-dir="../../orm/schemas/dev" --output-dir="../../orm/sql/dev" --overwrite
