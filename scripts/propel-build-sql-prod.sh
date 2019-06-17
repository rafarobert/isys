#!/usr/bin/env bash
php ../../vendor/propel/propel/bin/propel sql:build --connection="prod" --config-dir="../../orm" --schema-dir="../../orm/schemas/prod" --output-dir="../../orm/sql/prod" --overwrite
