Windows Terminal

```

/etc/wsl.conf
[boot]
systemd = true

[automount]
enabled = false
mountFsTab = true
options = "metadata"

[network]
generateHosts = true
generateResolvConf = true
```

```
%UserProfile%/.wslconfig
[wsl2]
memory=24GB
networkingMode=mirrored
firewall=true
dnsTunneling=true

[experimental]
autoMemoryReclaim=disabled
sparseVhd=true
```
