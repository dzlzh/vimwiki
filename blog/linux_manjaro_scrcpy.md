# Manjaro 安装 Scrcpy

[Scrcpy](https://github.com/Genymobile/scrcpy)

## 安装

```
yay -S scrcpy
# 安装 android tools
yay -S android-tools android-udev
```

## 连接手机

```
lsusb # 查看 USB Vendor ID
sudo vim /etc/udev/rules.d/51-android.rules
 # SUBSYSTEM=="usb",ATTR{idVendor}=="05c6",MODE="0666",GROUP="plugdev" 
sudo chmod a+r /etc/udev/rules.d/51-android.rules
sudo service udev restart
sudo reboot
```

## 参数

| 说明                   | 参数                              |
| :-:                    | :-:                               |
| 关闭手机屏幕           | `scrcpy -S`                       |
| 限制画面分辨率         | `scrcpy -m 1024`                  |
| 修改视频码率           | `scrcpy -b 4M`                    |
| 裁剪画面               | `scrcpy -c 1224:1440:0:0`         |
| 多设备切换             | `scrcpy -s 设备ID`                |
| 窗口置顶               | `scrcpy -T`                       |
| 显示触摸点击           | `scrcpy -t`                       |
| 全屏显示               | `scrcpy -f`                       |
| 文件传输默认路径       | `scrcpy --push-target /你的/目录` |
| 只读模式(仅显示不控制) | `scrcpy -n`                       |
| 屏幕录像               | `scrcpy -r .mp4 或 .mkv`          |
| 设置窗口标题           | `scrcpy --window-title 'title'`   |

## 快捷键

| 说明                         | 快捷键                  |
| :-:                          | :-:                     |
| 切换全屏模式                 | Ctrl+F                  |
| 将窗口调整为1：1（完美像素） | Ctrl+G                  |
| 调整窗口大小以删除黑色边框   | Ctrl+X  双击黑色背景    |
| 设备HOME键                   | Ctrl+H  鼠标中键        |
| 设备BACK键                   | Ctrl+B  鼠标右键        |
| 设备任务管理键 (切换APP)     | Ctrl+S                  |
| 设备菜单键                   | Ctrl+M                  |
| 设备音量+键                  | Ctrl+↑                  |
| 设备音量-键                  | Ctrl+↓                  |
| 设备电源键                   | Ctrl+P                  |
| 点亮手机屏幕                 | 鼠标右键                |
| 复制内容到设备               | Ctrl+V                  |
| 启用/禁用FPS计数器（stdout） | Ctrl+i                  |
| 安装APK                      | 将 apk 文件拖入投屏     |
| 传输文件到设备               | 将文件拖入投屏（非apk） |
