# Manjaro 安装并配置

## pacman

```sh
pacman -S    # 安装
pacman -R    # 删除单个软件包，保留其全部已经安装的依赖
pacman -Rs   # 删除指定软件包，及其所有没有被其他已安装软件使用的依赖
pacman -Rsc  # 删除软件包和所有依赖这个软件包的程序
pacman -Rdd  # 删除软件包，但不删除依赖这个软件包的其他程序
pacman -Syu  # 升级软件包
pacman -Syyu # 强制升级软件包
pacman -Sc   # 清理软件包缓存
pacman -Scc  # 清理所有软件包缓存
pacman -Ss   # 查询软件包数据库
pacman -Qs   # 查询已安装的软件包

yay -S  --mflags --skipinteg # 跳过checksums
```

## 初始化

```sh
sudo pacman-mirrors -GB testing -c China
sudo pacman-mirrors -c China
sudo pacman-mirrors -i -c China -m rank
sudo vim /etc/pacman.conf
    [archlinuxcn]
    SigLevel = Optional TrustedOnly
    Server = https://mirrors.ustc.edu.cn/archlinuxcn/$arch
    # Server = https:://mirrors.tuna.tsinghua.edu.cn/archlinuxcn/$arch
sudo pacman -Syu
sudo pacman -S archlinuxcn-keyring
sudo pacman -Syyu # 强制升级软件包
sudo pacman -Sy yay
```

### 字体

```sh
yay -S wqy-zenhei wqy-microhei-lite wqy-microhei wqy-bitmapfont
yay -S ttf-font-awesome paper-icon-theme ttf-weather-icons
# yay -S ttf-font-icons
# yay -S noto-fonts noto-fonts-cjk noto-fonts-emoji
# yay -S adobe-source-code-pro-fonts adobe-source-han-serif-cn-fonts adobe-source-han-sans-cn-fonts
# 安装 powerline 字体
git clone https://github.com/powerline/fonts.git --depth=1
fc-cache -vf
```

### 常用软件

```sh
# polybar rofi dunst feh termite tilda
yay -S polybar rofi dunst feh
# Terminal
yay -S termite tilda
# fcitx-rime
yay -S fcitx-im fcitx-configtool fcitx-rime
# jq aria2 ag rg
yay -S jq aria2 the_silver_searcher ripgrep
# nvim tmux
yay -S neovim tmux
# zsh oh-my-zsh
yay -S zsh
sh -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"
# v2ray Or shadowsocks
yay -S v2ray
yay -S shadowsocks
# Redshift
yay -S redshift
# xprop xrandr
yay -S xorg-xprop xorg-xrandr
# google chrome google-chrome-stable --proxy-server="socks5://127.0.0.1:1080"
yay -S google-chrome
# deepin-screenshot
yay -S deepin-screenshot
# wechat
yay -S deepin-wine-wechat
# music
yay -S iease-music
# telegram
yay -S telegram-desktop
```

### VirtualBox

```sh
yay -S virtualbox $(pacman -Qsq "^linux" | grep "^linux[0-9]*[-rt]*$" | awk '{print $1"-virtualbox-host-modules"}' ORS=' ')
sudo vboxreload
sudo gpasswd -a $USER vboxusers
```
