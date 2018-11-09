#!/bin/bash

clear
echo
echo "####################################"
echo "# Update                           #"
echo "####################################"
echo

yum -y update


echo
echo "####################################"
echo "# Install zsh git wget             #"
echo "####################################"
echo

yum -y install zsh git wget

echo
echo "####################################"
echo "# Set the user use the zsh         #"
echo "####################################"
echo

chsh -s /bin/zsh

echo
echo "####################################"
echo "# Install oh-my-zsh                #"
echo "####################################"
echo

git clone git://github.com/robbyrussell/oh-my-zsh.git ~/.oh-my-zsh
cp ~/.oh-my-zsh/templates/zshrc.zsh-template ~/.zshrc
