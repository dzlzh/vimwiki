# Git 规范标准

## 提交

> [阮一峰的网络日志 - Commit message 和 Change log 编写指南](http://www.ruanyifeng.com/blog/2016/01/commit_message_change_log.html)

### 格式

- Header <类型>(<作用域>): <主题>
- <空行>
- Body 提交详情
- <空行>
- Footer <脚注>

> 任何一行都不得超过 72 个字符

### 类型

- `feat` : 特性(`feature`)
- `fix` : bug 修复
- `docs` : 文档
- `style` : 代码格式，例如丢了个分号，格式化代码，修改了缩进之类的
- `refactor` : 没有修改功能的情况下重写、优化、整理了代码
- `test` : 添加之前遗漏的测试
- `chore` : 维护，零星的工作。我们约定：当该次提交不属于上面几种时，使用该类型，注意如果提交明确属于上面几种时，尽量不要使用该类型，它不够明确

### Revert

当前 `Commit` 用于撤销以前的 `Commit`，则必须以 `revert:` 开头，后面跟着被撤销 `Commit` 的 `Header`。

`revert: Header`

## 分支名称

- `master` 稳定分支
- `develop ` 不稳定分支(开发分支)
- `issue` 或 `fixbug` BUG分支
- `feature` 新功能分支
- `release` 预发布分支

## 忽略文件

- `.gitignore`
- `.gitkeep`

## emoji

| emoji                       | code                          | info                        |
| :-------------------------: | :---------------------------: | :-------------------------: |
| :art:                       | `:art:`                       | 改进结构和代码格式          |
| :zap:                       | `:zap:`                       | 优化性能                    |
| :fire:                      | `:fire:`                      | 移除代码或文件              |
| :bug:                       | `:bug:`                       | 修复 BUG                    |
| :ambulance:                 | `:ambulance:`                 | 关键补丁                    |
| :sparkles:                  | `:sparkles:`                  | 引入新功能                  |
| :memo:                      | `:memo:`                      | 写文档                      |
| :rocket:                    | `:rocket:`                    | 部署                        |
| :lipstick:                  | `:lipstick:`                  | 更新 UI 和样式              |
| :tada:                      | `:tada:`                      | 初次提交                    |
| :white_check_mark:          | `:white_check_mark:`          | 添加测试                    |
| :lock:                      | `:lock:`                      | 修复安全问题                |
| :apple:                     | `:apple:`                     | 修复 macOS 下的问题         |
| :penguin:                   | `:penguin:`                   | 修复 Linux 下的问题         |
| :checkered_flag:            | `:checkered_flag:`            | 修复 Windows 下的问题       |
| :robot:                     | `:robot:`                     | 修复 Android 下的问题       |
| :green_apple:               | `:green_apple:`               | 修复 iOS 下的问题           |
| :bookmark:                  | `:bookmark:`                  | 发版/版本标签               |
| :rotating_light:            | `:rotating_light:`            | 解决的警告                  |
| :construction:              | `:construction:`              | 工作正在进行中              |
| :green_heart:               | `:green_heart:`               | 修复 CI 构建                |
| :arrow_down:                | `:arrow_down:`                | 降级依赖库                  |
| :arrow_up:                  | `:arrow_up:`                  | 升级依赖库                  |
| :construction_worker:       | `:construction_worker:`       | 添加 CI 构建系统            |
| :chart_with_upwards_trend:  | `:chart_with_upwards_trend:`  | 添加分析或跟踪代码          |
| :hammer:                    | `:hammer:`                    | 重构代码                    |
| :heavy_minus_sign:          | `:heavy_minus_sign:`          | 删除依赖关系                |
| :whale:                     | `:whale:`                     | 关于 Docker 的工作          |
| :heavy_plus_sign:           | `:heavy_plus_sign:`           | 添加依赖关系                |
| :wrench:                    | `:wrench:`                    | 更改配置文件                |
| :globe_with_meridians:      | `:globe_with_meridians:`      | 国际化和本地化              |
| :pencil2:                   | `:pencil2:`                   | 修复错别字                  |
| :hankey:                    | `:hankey:`                    | 还需改进的代码              |
| :rewind:                    | `:rewind:`                    | 撤销更改                    |
| :twisted_rightwards_arrows: | `:twisted_rightwards_arrows:` | 合并分支                    |
| :package:                   | `:package:`                   | 更新已编译的文件或包        |
| :alien:                     | `:alien:`                     | 由于外部 API 更改而更新代码 |
| :truck:                     | `:truck:`                     | 移动或重命名文件            |
| :page_facing_up:            | `:page_facing_up:`            | 添加或更新 license          |
| :boom:                      | `:boom:`                      | 重大变化                    |
| :bento:                     | `:bento:`                     | 添加或更新静态资源          |
| :ok_hand:                   | `:ok_hand:`                   | 由于代码审查更改而更新代码  |
| :wheelchair:                | `:wheelchair:`                | 辅助功能                    |
| :bulb:                      | `:bulb:`                      | 添加注释                    |
| :beers:                     | `:beers:`                     | 忘情的写代码                |
| :speech_balloon:            | `:speech_balloon:`            | 更新文本和文字              |
| :card_file_box:             | `:card_file_box:`             | 数据库相关改变              |
