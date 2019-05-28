icacls ../../../ /grant rafae:(d,wdac)

cd ../..

TAKEOWN /F app /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F orm/classes /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F orm/config /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F orm/crud /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F orm/map /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F orm/migrations /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F orm/schema /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F orm/sql /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F assets /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F icon /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F plugins /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F src /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F isys /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F propel_log.txt /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"

cd isys/scripts