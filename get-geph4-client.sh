#!/bin/bash

curl https://f001.backblazeb2.com/file/geph-dl/geph4-binaries/geph4-client-linux-amd64 -v4L -o ./geph4-client || exit
chmod +x ./geph4-client || exit

