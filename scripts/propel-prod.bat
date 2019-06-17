@echo off

php ../../vendor/propel/propel/bin/propel model:build --config-dir="../../orm" --schema-dir="../../orm/schemas/prod" --output-dir="../../orm/classes"
