@echo off
php ../../vendor/propel/propel/bin/propel model:build --config-dir="../../orm" --schema-dir="../../orm/schemas/dev" --output-dir="../../orm/classes"
