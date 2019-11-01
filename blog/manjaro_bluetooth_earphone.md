# Manjaro 中使用蓝牙耳机

## 安装必要软件包

```
yay -S bluez bluez-firmware pulseaudio-bluetooth pulseaudio-alsa pavucontrol
```

- `bluez` 软件包提供蓝牙协议栈
- `pulseaudio-bluetooth` 则为 bluez 提供了 PulseAudio 音频服务，若没有安装则蓝牙设备在配对完成后，连接会失败，提示
- `pulseaudio-alsa` 则使 pulseaudio 和 alsa 协同使用，之后就可以用 alsamixer 来管理蓝牙音频了
- `pavucontrol` pavucontrol 则提供了 pulseaudio 的图形化控制界面

## 启动服务

```
sudo systemctl enable bluetooth
sudo systemctl start bluetooth

pulseaudio -k
pulseaudio --start

sudo usermod -aG lp $USER
```
