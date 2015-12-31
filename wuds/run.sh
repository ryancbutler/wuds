iface=`grep IFACE config.py | cut -d'=' -f 2 | sed "s/['\" ]//g"`
echo "Disabling WLAN0"
sudo ifconfig wlan0 down
echo "CREATING MONITORING INTERFACE"
sudo iw dev wlan0 interface add $iface type monitor
sudo ifconfig $iface up
echo "LAUNCHING WUDS"
sudo python ./core.py
echo "CLEANING UP"
sudo ifconfig $iface down
sudo iw dev $iface del
