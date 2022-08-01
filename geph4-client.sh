#!/bin/bash

time=`date +%s`

logdir=./geph4-client.log/

mkdir -p $logdir

while true
do
	pidof geph4-client || break;

	echo "geph-client is starting, refused to start another one.";
	exit;
done

nohup ./geph4-client $* 2>&1 >> ${logdir}/${time}.log &
