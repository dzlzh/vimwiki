# ssh

```
Host *
    ServerAliveInterval 10
    ServerAliveCountMax 3
Host Jump
    HostName 0.0.0.0
    Port 22
    User root
    IdentityFile ~/.ssh/id_rsa
Host remote
    HostName 0.0.0.0
    Port 22
    User root
    ProxyJump Jump
    IdentityFile ~/.ssh/id_rsa
```
