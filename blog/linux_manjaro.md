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
yay -S wqy-microhei adobe-source-code-pro-fonts 
# 安装 powerline 字体
git clone https://github.com/powerline/fonts.git
cd fonts
./install.sh
cd ..
rm -rf fonts
```

### 输入法

```sh
yay -S fcitx-im fcitx-configtool fcitx-rime
vim ~/.xprofile
    export GTK_IM_MODULE=fcitx
    export QT_IM_MODULE=fcitx
    export XMODIFIERS="@im=fcitx"
    exec fcitx &
```

### 常用软件

```sh
# zsh nvim tmux
yay -S zsh nvim tmux
# oh-my-zsh
sh -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"
# 安装主题
git clone https://github.com/bhilburn/powerlevel9k.git ~/.oh-my-zsh/custom/themes/powerlevel9k
vim ~/.zshrc 
    ZSH_THEME="powerlevel9k/powerlevel9k"
# xrandr 多显示器管理
yay -S xorg-xrandr
xrandr --output VGA1 --primary --auto --output VGA1 --auto --left-of LVDS1
# google chrome
yay -S google-chrome
# wechat
yay -S deepin.com.wechat
```

### 代理

```sh
# 安装 SS
sudo pacman -S shadowsocks

sslocal 

alias setproxy="export ALL_PROXY=socks5://127.0.0.1:1080"
alias unsetproxy="unset ALL_PROXY"

# 可先使用命令让浏览器走代理
google-chrome-stable --proy-service="socks5://127.0.0.1:1080"
```
