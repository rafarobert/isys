#!/usr/bin/env bash
php ../../vendor/propel/propel/bin/propel database:reverse --config-dir="../../orm" --output-dir="../../orm/schemas/dev" --recursive dev
