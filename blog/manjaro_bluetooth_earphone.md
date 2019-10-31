# Manjaro 中使用蓝牙耳机

## 安装必要软件包

```
yay -S bluez bluez-firmware pulseaudio-bluetooth pulseaudio-alsa
```

- `bluez` 软件包提供蓝牙协议栈
- `pulseaudio-bluetooth` 则为 bluez 提供了 PulseAudio 音频服务，若没有安装则蓝牙设备在配对完成后，连接会失败，提示
- `pulseaudio-alsa` 则使 pulseaudio 和 alsa 协同使用，之后就可以用 alsamixer 来管理蓝牙音频了

## 启动服务

```
sudo systemctl enable bluetooth
sudo systemctl start bluetooth

sudo pulseaudio -k
sudo pulseaudio --start

sudo usermod -a -G lp $USER
```
