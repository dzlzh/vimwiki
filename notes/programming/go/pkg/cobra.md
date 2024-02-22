# cobra

```go
// 命令行前初始化
cobra.OnInitialize(initConfig)
// Flags
{
    // 全局 Flags
    rootCmd.PersistentFlags()
    // 在父命令中配置, 子命令可以使用父命令的 Flags
    TraverseChildren: true,
}
// Hooks
{
    PersistentPreRun // 对子命令生效
    PreRun
    Run
    PostRun
    PersistentPostRun // 对子命令生效
}
```
