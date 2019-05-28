icacls ../../../ /grant rafae:(d,wdac)

cd ../..

TAKEOWN /F app /R /S "ibost-lt11osi" /U "rgutierrez" /P "095RAFAgu*"
TAKEOWN /F orm /R /S "ibost-lt11osi" /U "rgutierrez" /P "095RAFAgu*"
TAKEOWN /F assets /R /S "ibost-lt11osi" /U "rgutierrez" /P "095RAFAgu*"
TAKEOWN /F icon /R /S "ibost-lt11osi" /U "rgutierrez" /P "095RAFAgu*"
TAKEOWN /F plugins /R /S "ibost-lt11osi" /U "rgutierrez" /P "095RAFAgu*"
TAKEOWN /F src /R /S "ibost-lt11osi" /U "rgutierrez" /P "095RAFAgu*"
TAKEOWN /F isys /R /S "ibost-lt11osi" /U "rgutierrez" /P "095RAFAgu*"
TAKEOWN /F propel_log.txt /S "ibost-lt11osi" /U "rgutierrez" /P "095RAFAgu*"

cd isys/scripts