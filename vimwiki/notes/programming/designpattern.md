# 设计模式

## 面向对象编程的基本原则(S.O.L.I.D)

| 首字母 - 简写（全称）                  | 指代         | 概念                                                             |
| :---:                                  | :---:        | :---:                                                            |
| S-SRP(Single Responsibility Principle) | 单一功能原则 | 对象应该仅具有一种单一功能                                       |
| O-OCP(Opened Closed Principle)         | 开闭原则     | 软件应该是对于扩展开放的，但对于修改封闭的                       |
| L-LSP(Liscov Substitution Principle)   | 里氏替换原则 | 程序中的对象应该是可以在不改变程序正确性的前提下被他的子类所替换 |
| I-ISP(Interface Segregation Principle) | 接口隔离原则 | 多个特定客户端接口要好于一个宽泛用途的接口                       |
| D-DIP(Dependency Inversion Principle)  | 依赖反转原则 | 一个方法应该遵从「依赖于抽象而不是一个实例」                     |

## MVC 模式

模型 - 视图 - 控制器，一种 C/S 或者 B/S 软件工程的组织方式

- 模型（Model）：数据和存储的封装
- 视图（View）：展现层的封装，如 Web 系统中的模板文件
- 控制器（Controller）：逻辑层的封装

## 创建型

- [单例模式](designpattern/singleton.md)
- [工厂模式](designpattern/factory.md)
- [注册模式](designpattern/registry.md)
- [原型模式](designpattern/prototype.md)

## 结构型

- [适配器模式](designpattern/adapter.md)
- [装饰器模式](designpattern/decorator.md)
- [代理模式](designpattern/proxy.md)
- [数据对象映射模式](designpattern/data_mapper.md)

## 行为型

- [策略模式](designpattern/strategy.md)
- [观察者模式](designpattern/observer.md)
- [迭代器模式](designpattern/iterator.md)
