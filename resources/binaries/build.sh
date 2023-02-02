#!/usr/bin/env sh

#eval `ssh-agent -s`
#echo "$PRIVATE_KEY" | tr -d '\r' | ssh-add -
echo "update marathon project "
rsync -rtv --exclude ".git"  . $NAME@172.31.146.106:/srv/comptes/marathon22/$NAME/www/
ssh $NAME@172.31.146.106 "/srv/comptes/marathon22/$NAME/www/resources/binaries/install.sh"

#composer install
#npm install && npm run build
#rsync -rtv . $NOM@hemery-virtual-machine:/var/www/html/robert
