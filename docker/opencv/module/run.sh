#!/bin/bash
/etc/service/progress start
service postgresql start
service rabbitmq-server start
service redis-server start
service nginx start
service postfix start

# Creating a taiga user and virtualhost for rabbitmq
rabbitmqctl add_user develop PASSWORD
rabbitmqctl add_vhost develop
rabbitmqctl set_permissions -p develop develop ".*" ".*" ".*"

# install
install() {
  if [ ! -e /develop/workspace/sample ]; then
    cp -ra /develop/sample /develop/workspace/sample
  fi
}

# install
install

jupyter notebook --allow-root

/etc/service/progress end

tail -f /dev/null
