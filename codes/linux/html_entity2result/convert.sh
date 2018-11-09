#!/usr/bin/env bash

ls -1 ./ | while read loop
do
  sed -i -f ex "$loop"
done
