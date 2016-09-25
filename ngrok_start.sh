#!/bin/sh
### BEGIN INIT INFO
# Provides:          ngrok
# Required-Start:    $local_fs
# Required-Stop:     $local_fs
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: Start/stop ngrok
### END INIT INFO
 
# More details see:
# http://www.penguintutor.com/linux/ngrok
 
### Customize this entry
# Set the USER variable to the name of the user to start ngrok under
export USER='pi'
### End customization required
 
eval cd ~$USER
 
case "$1" in
  start)
    # 启动命令行。此处自定义分辨率、控制台号码或其它参数。
    su $USER -c '/home/pi/linux_arm/ngrok -config=/home/pi/linux_arm/ngrok.cfg start ssh web mstsc vnc &'
    echo "Starting ngrok  for $USER "
    ;;
  stop)
    # 终止命令行。此处控制台号码与启动一致。
    su $USER -c 'killall ngrok'
    echo "ngrok stopped"
    ;;
  *)
    echo "Usage: /etc/init.d/ngrok {start|stop}"
    exit 1
    ;;
esac
exit 0





/**
 * 

 https://wolfpaulus.com/journal/software/tomcat-jessie/
 */

/etc/systemd/system/tomcat.service
# Systemd unit file for tomcat
[Unit]
Description=Apache Tomcat Web Application Container
After=syslog.target network.target
[Service]
Type=forking
Environment=JAVA_HOME=/usr/java/latest/jre
Environment=CATALINA_PID=/usr/share/tomcat/temp/tomcat.pid
Environment=CATALINA_HOME=/usr/share/tomcat
Environment=CATALINA_BASE=/usr/share/tomcat
Environment='CATALINA_OPTS=-Xms512M -Xmx1024M -server -XX:+UseParallelGC'
Environment='JAVA_OPTS=-Djava.awt.headless=true -Djava.security.egd=file:/dev/./urandom'
ExecStart=/usr/share/tomcat/bin/startup.sh
ExecStop=/usr/share/tomcat/bin/shutdown.sh
User=tomcat
Group=tomcat
[Install]
WantedBy=multi-user.target
 
sudo systemctl daemon-reload
sudo systemctl enable tomcat
sudo systemctl start tomcat
