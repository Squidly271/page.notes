#!/bin/bash

mkdir -p "/tmp/GitHub/page.notes/source/page.notes/usr/local/emhttp/plugins/page.notes/"

cp /usr/local/emhttp/plugins/page.notes/* /tmp/GitHub/page.notes/source/page.notes/usr/local/emhttp/plugins/page.notes -R -v -p
find . -maxdepth 9999 -noleaf -type f -name "._*" -exec rm -v "{}" \;


