icacls ../../../ /grant rafae:(d,wdac)

cd ../..

TAKEOWN /F app /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F orm /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F assets /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F icon /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F plugins /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F src /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F isys /R /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"
TAKEOWN /F propel_log.txt /S "ibost-lt11osi" /U "rafae" /P "inspiron15R-"

cd isys/scripts