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
pacman -U    # 回滚
# 可在 /etc/pamac.conf 中配置忽略更新

yay -S  --mflags --skipinteg # 跳过 checksums
# 生成配置可在~/.config/yay/config.json 中更改 AUR 源
# https://aur.tuna.tsinghua.edu.cn
yay -Syu --devel --combinedupgrade --save
```

## 初始化

```sh
# sudo pacman-mirrors -GB testing -c China
# sudo pacman-mirrors -c China
sudo pacman-mirrors -i -c China -m rank
sudo vim /etc/pacman.conf
    [archlinuxcn]
    SigLevel = Optional TrustedOnly
    # Server = https://mirrors.ustc.edu.cn/archlinuxcn/$arch
    Server = https://mirrors.tuna.tsinghua.edu.cn/archlinuxcn/$arch

    [antergos]
    SigLevel = TrustAll
    Server = https://mirrors.tuna.tsinghua.edu.cn/antergos/$repo/$arch

    [arch4edu]
    SigLevel = TrustAll
    Server = https://mirrors.tuna.tsinghua.edu.cn/arch4edu/$arch
sudo pacman -Syu
sudo pacman -S archlinuxcn-keyring manjaro-settings-manager
sudo pacman -Syyu # 强制升级软件包
sudo pacman -Sy yay
yay --aururl "https://aur.tuna.tsinghua.edu.cn" --save
```

### 字体

```sh
yay -S noto-fonts noto-fonts-cjk noto-fonts-emoji
# yay -S wqy-zenhei wqy-microhei-lite wqy-microhei wqy-bitmapfont
# yay -S adobe-source-han-sans-cn-fonts adobe-source-han-serif-cn-fonts
# yay -S adobe-source-code-pro-fonts adobe-source-han-serif-cn-fonts adobe-source-han-sans-cn-fonts
yay -S ttf-font-awesome paper-icon-theme awesome-terminal-fonts
# yay -S ttf-weather-icons
# yay -S ttf-font-icons
# 安装 powerline 字体
git clone https://github.com/powerline/fonts.git --depth=1
fc-cache -vf
```

### 常用软件

```sh
# polybar rofi dunst feh termite tilda
yay -S polybar rofi dunst feh
# Terminal
yay -S termite tilda fzf
# fcitx-rime
yay -S fcitx-im fcitx-configtool fcitx-rime
# jq aria2 ag rg
yay -S jq the_silver_searcher ripgrep ctags bat
# download
yay -S aria2 axel
# nvim tmux
yay -S neovim tmux
# zsh oh-my-zsh chsh -s /bin/zsh
yay -S zsh
sh -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"
# v2ray Or shadowsocks Or clase
# yay -S v2ray
# yay -S shadowsocks
yay -S clash
# Redshift
yay -S redshift
# xprop xrandr
yay -S xorg-xprop xorg-xrandr
# google chrome google-chrome-stable --proxy-server="socks5://127.0.0.1:1080"
yay -S google-chrome
# flameshot
yay -S flameshot
# deepin-screenshot
# yay -S deepin-screenshot
# wechat $WINELOADER winecfg Graphics->Allow the window manager to decorate the windows
# https://github.com/countstarlight/deepin-wine-wechat-arch
yay -S deepin-wine-wechat
# music
# yay -S netease-cloud-music
# yay -S iease-music
# telegram
yay -S telegram-desktop
# dingtalk
yay -S dingtalk-electron
yay -S deepin.com.dingtalk.com
# yay -S dingtalk-linux
# db
yay -S dbeaver
# redis
yay -S redis-desktop-manager
# curl
yay -S insomnia
# proxy
yay -S mitmproxy
# read
yay -S foliate
```

### VirtualBox

```sh
yay -S virtualbox $(pacman -Qsq "^linux" | grep "^linux[0-9]*[-rt]*$" | awk '{print $1"-virtualbox-host-modules"}' ORS=' ')
sudo vboxreload
sudo gpasswd -a $USER vboxusers
```
