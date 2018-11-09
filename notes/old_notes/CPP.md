# CPP Primer

## 头文件

```C++
//标准库的头文件用尖括号<>括起来，非标准库的头文件用双引号" "括起来。
#include <iostream> //输入，输出
#include <string>   //string类
#include <cctype>   //字符操作函数
#include <vector>   //vector类型
#include <bitset>   //bitset类型
#include <exception>//最常见的异常类
#include <stdexcept>//常见的异常类
#include <new>      //bad_alloc异常类型
#include <type_info>//bad_cast异常类型
#include <fstream>  //文件流
#include <sstream>  //字符串流

#include <cstddef>  //size_t类型ptrdiff_t类型  标准库类型
#include <cstdlib>  //NULL变量
#include <cstring>  //C风格字符串库函数
#include <cassert>  //assert预处理宏
```

## 操作符

```C++
=  //赋值操作符
<< //输出操作符
>> //输入操作符
:: //作用域操作符
.  //点操作符
() //调用操作符
== //等于操作符
!= //不等于操作符
<= //小于或等于操作符
<  //小于操作符
>= //大于或等于操作符
>  //大于操作符
//复合赋值操作符
+=

//自增操作符（有前自增和后自增）
++

[] //下标操作符
*  //解引用操作符
&  //取地址操作符
-> //箭头操作符
sizeof //返回一个对象或类型名的长度
,  //逗号操作符  从左向右计算。结果是其右边的值。

//强制类型转换
static_cast<type>()         //编译器隐式执行的任何类型转换都可以由static_cast显式完成。
dynamic_cast<type>()        //支持运行时识别指针或引用所指向的对象。
const_cast<type>()          //将转换掉表达式const性质。
reinterpret_cast<type>()    //为操作数的位模式提供较低层次的重新解释。
type (expr);
(type) expr;


```

## 访问标号

```c++
private  //不是类的组成部分的代码不能访问。
public   //定义的成员在程序的任何部分都可以访问。
```

## 对象

```C++
//iostream
cin   //标准输入
cout  //标准输出
cerr  //标准错误
clog  //程序执行的一般信息
endl  //输出一个换行符并刷新缓冲区
flush //刷新流不输出任何东西
ends  //在缓冲区插入空字符null，然后刷新
unitbuf //刷新所有输出
```

## 命名空间

### using声明

```C++
//形式
using namespace::name;
//例子
using std::cin;
using std::cout;
using std::endl;
```

```C++
using namespace std; //命名空间std;
```

## 控制结构

```C++
//while循环
while (condition)
{
    //while_body_statement;
}

//for循环
for (int i = 0; i >= 10; ++i)
{
    ......
}

//if判断
if (condition){
    ......
} else {
    ......
}
```

## 整型

表示整数、字符和布尔值的算术类型合称为整型（integral type）。

字符类型有两种：`char`和`wchar_t`。

整数类型有三种：`short`、`int`和`long`。

布尔值：`bool`true（非0）和false（0）。

除bool类型外，整型可以是__带符号的(signed)__也可以是__无符号的(unsigned)__。

整型int、short和long都默认为带符号型。要获得无符号型则必须指定该类型为unsigned。

## 浮点型

类型`float`、`double`和`long double`分别表示单精度浮点数、双精度浮点数和扩展精度浮点数。

float型只能保证6位有效数字，而double型至少可以保证10位有效数字。

## 变量

__左值__(lvalue)：左值可以出现在赋值语句的左边或右边。

__右值__(rvalue)：右值只能出现在赋值的右边，不能出现在赋值语句的左边。

变量是左值。

变量名，即变量的__标识符(identifier)__，可以由字母、数字和下划线组成。变量名必须以字母
或下划线开头，并且区分大小写字母：C++中的标识符都是大小写敏感的。

### 变量命名习惯

- 变量名一般用小写字母。
- 标识符应使用能帮助记忆的名字，也就是说，能够提示其在程序中的用法的名字。
- 包含多个词的标识符书写为在每个词之间添加一个下划线，或者每个内嵌的词的第一个字母都大写。

### 初始化

初始化有两种形式：__复制初始化(copy-initialization)__和__直接初始化(direct-initialization)__。
复制初始化语法用等号(=)，直接初始化则是把初始化式放在括号中。

### 声明和定义

变量的__定义(definition)__用于变量分配存储空间，还可以为变量指定初始值。在一个程序中，就是有且仅有一个定义。

__声明(declaration)__用于向程序表明变量的类型和名字。定义也是声明：当定义变量时我们声明了它的类型和名字。可以通过
使用`extern`关键字声明变量名而不定义它。不定义变量的声明包括对象名、对象类型和对象类型前的关键字`extern`。

> 在C++语言中，变量必须且仅能定义一次，而且在使用变量之前必须定义或声明变量。

## 作用域

定义在所有函数外部的名字具有__全局作用域(global scope)__，可以在程序中的任何地方访问。

定义在函数内定义的名字具有__局部作用域(local scope)__。

定义在语句内的名字具有__语句作用域(statement scope)__。

__类作用域(class scope)__

__命名空间作用域(namespace scope)__

## 常量

常量在定义后就不能被修改，所以定义时必须初始化。

常量的定义是加关键字`const`。

__const对象默认为文件的局部变量__

通过指定const变量为extern，就可以在整个程序中访问const对象。

> 非const变量默认为extern。要使const变量能够在其他的文件中访问，必须显式地指定它为extern.

## 引用

__引用(reference)__就是对象的另一个名字。在实际程序中，引用主要用作函数的形式参数。

引用是一种__复合类型(compound type)__，通过在变量名前添加`&`符号来定义。
复合类型是指用其他类型定义的类型。引用必须初始化，初始化必须是一个对象。

> 当引用初始化后，只要该引用存在，它就保持绑定到初始化时指向的对象。不可能将引用绑定到另一个对象。

const引用是指向const对象的引用。const引用是只读的。

> 非const引用只能绑定到与该引用同类型的对象。



> const引用则可以绑定到不同但相关的类型的对象或绑定到右值。

## typedef名字

`typedef`可以用来定义类型的同义词。

typedef定义以关键字`typedef`开始，后面是数据类型和标识符。标识符或类型名并没有引入新的类型，而只是现在数据类型的同义词。
typedef名字可以出现程序中类型名可以出现的任何位置。

```c++
typedef type value; //用value代type
```

typedef通常被用于以下三种目的：

- 为了隐藏特定类型的实现，强调使用类型的目的。
- 简化复杂的类型定义，使其更易理解。
- 允许一种类型用二多个目的，同时使得每次使用该类型的目的明确。

## 枚举

__枚举(enumeration)__的定义包括关键字`enum`，其后是一个可选的枚举类型名，和一个用花括号括起来、用逗号分开的__枚举成员(enumerator)__列表。

```C++
enum open_modes {input,output,append}; //input = 0, output = 1, append = 2
```

> 默认地，第一个枚举成员赋值为0，后面的第一个枚举成员赋的值比前面的大1.

__枚举成员是常量__

可以为一个或多个枚举成员提供初始值，用来初始化枚举成员的值必须是一个__常量表达式(constant expression)__。

```c++
enum Forms {shape = 1, sphere, cylinder}; // shape = 1, sphere = 2, cylinder = 3
```

不能改变枚举成员的值。枚举成员本身就是一个常量表达式，所以也可用于需要常量表达式的任何地方。

每个enum都定义一种唯一的类型。

## 类类型

C++中，通过定义__类(class)__来处定义数据类型。类定义了该类型的对象包含的数据和该类型的对象可以执行的操作。

每个类都定义了一个__接口(interface)__和一个__实现(implementation)__。
接口由使用该类的代码需要执行的操作组成。实现一般包括该类所需要的数据。
实现还包括定义该类需要的但又不供一般性使用的函数。

类定义以关键字`class`开始，其后是该类的名字标识符。类体位于花括号里面。花括号后面必须要跟一个分号。

> 不要忘记类定义后面的分号。

类体可以为空。类体定义了组成该类型的数据和操作。这些操作和数据是类的一部分，也称为类的__成员(member)__。
操作称为成员函数，而数据则称为__数据成员(data member)__。

### struct关键字

如果使用`class`关键字来定义类，那么定义在第一个访问标号前的任何成员都隐式指定为private;
如果使用`struct`关键字，那么这些成员都是public。

> 用`class`和`struct`关键字定义类的唯一差别在于默认访问级别：默认情况下，struct的成员为public,而class的成员为private。

## 头文件

头文件为相关声明提供了一个集中存放的位置。头文件一般包含类的定义、extern变量的声明和函数的声明。

> 因为头文件包含在多个源文件中，所以不应该含在变量或函数的定义。

对于头文件不应该含有定义这一规则，有三个例外。头文件可以定义类、值在编译时就已知道的const对象和inline函数。

### 头文件保护符

```c++
//测试SALESITEM_H预处理器变量是否未定义,如果没有定义执行后面行，直到#endif
#ifndef SALESITEM_H
#define SALESITEM_H  //
    //在这里放项目类及相关函数的定义
#endif
```

## string类型

string类型的输入操作符：
- 读取并忽略开关所有的空白字符（如空格，换行符，制表符）。
- 读取字符直至再次遇到空白字符，读取终止。

### getline读取整行文本

`getline`这个函数接受两个参数：一个输入流对象和一个string对象。
getline函数从输入流的下一行读取，并保存读取的内容到string中，但不包括__换行符__。

> getline并不忽略行开关的换行符。只要遇到换行符getline将停止读入并返回。



> 由于getline函数返回时丢弃换行符，换行符将不会存储在dtring对象中。

### string对象的操作

```C++
s.empty(); //如果s为空串，则返回true,否则返回false。
s.size();  //返回s中字符的个数
s[n];      //返回s中位置为n的字符，位置从0开始计数
s1 + s2;   //把s1和s2连接成一个新字符串，返回新生成的字符串
s1 = s2;   //把s1内容替换为s2的副本
v1 == v2;  //!=,<,<=,>和>=保持这些操作符惯有的含义
```

## 标准库vector类型

`vector`是一个__类模板(class template)__。

```C++
vector<int> ivec;              //含有若干int类型对象的vector
vector<Sales_item> Sales_vec;  //含有若干Sales_item类型对象
```

> vector不是一种数据类型，而只是一个类模板，可用来定义任意多种数据类型。vector类型的每一种都指定了其保存元素的类型。

### vector类定义的构造函数

```C++
vector<T> v1;       //vector保存类型为T的对象。默认构造函数v1为空。
vector<T> v2(v1);   //v2是v1的一个副本。
vector<T> v3(n,i);  //v3包含n个值为i的元素。
vector<T> v4(n);    //v4含有值初始化的元素的n个副本。
```

### 值初始化

如果vector保存内置类型int类型的元素，那么标准库将用0值创建元素初始化值。

如果vector保存内置类型string类型的元素，那么标准库将用该类型的默认构造函数创建元素初始化值。

有自定义构造函数但没有默认构造函数的类，在初始化这种类型的vector对象时，程序员就不能仅提供元素个数，还需要元素初始值。

### vector对象的操作

```C++
v.empty();        //如果v为空串，则返回true,否则返回false。
v.size();         //返回v中元素的个数。
v.push_back(t);   //在v的末尾增加一个值为t的元素。
v[n];             //返回v中位置为n的元素。
v1 = v2;          //把v1的元素替换为v2中元素的副本。
v1 == v2;         //!=,<,<=,>和>=保持这些操作符惯有的含义。
```
> 使用`size_type`类型时，必须指出该类型是在哪里定义的。vector类型总是包括vector的元素类型。`vector<int>::size_type;`



> 必须是已存在的元素才能用下标操作符进行索引。通过下标操作进行赋值时，不会添加任何元素。

## 迭代器(iterator)

__迭代器(iterator)__是一种检查容器内元素并遍历元素的数据类型。

### 容器的`iterator`类型

每种容器类型都定义了自己的迭代器类型，如vector:

```C++
vector<int>::iterator iter;
```

> 各容器类都定义了自己的iterator类型，用于访问容器内的元素。换句话说，每个容器都定义了一个名为iterator的类型，而这种类型支持(概念上的)迭代器的各种操作。

### begin和end操作

`begin`返回的迭代器指向第一个元素。

`end`返回的迭代器指向vector的"末端元素的下一个"。

### vector迭代器的自增和解引用运算
迭代器类型可以用解引操作符来访问迭代器所指向的元素。

迭代器使用自增操作符向前移动迭代器指向容器中下一个元素。

> 由于end操作返回的迭代器不指向任何元素，因此不能对它进行解引用或自增操作。

### const_iterator类型

`const_iterator`类型只能用于读取容器内元素，但不能改变其值。

## 标准库bitset类型

bitset类是一种类模板。

### bitset对象的定义和初始化

bitset在定义时，要明确bitset含有多少位，须在尖括号内给出它的长度值。

```C++
bitset<32> bitvec; 
```

> 长度值必须是常量表达式。

```C++
bitset<n> b;            //b有n位，每位都为0
bitset<n> b(u);         //b是unsigned long型u的一个副本
bitset<n> b(s);         //b是string对象s中含有的位串的副本
bitset<n> b(s,pos,n);   //b是s中从位置pos开始的n个位的副本
```

#### 用unsigned值初始化bitset对象

当用unsigned long值作为bitset对象的初始值时，该值将转化为二进制的位模式。而bitset对象中的位集作为这种位模式的副本。

> bitset类型长度大于unsigned long值的二进制位数，则其余高阶位将置为0;如果bitset类型长度小于unsigned long值的二进制位数，则只使用unsigned值中的低阶位，超过bitset类型长度的高阶位将被丢弃。

#### 用string对象初始化bitset对象

当用string对象初始化bitset对象时，string对象直接表示为位模式。从string对象读入位集的顺序是从右向左。

> string对象和bitset对象之间是反向转化的：string对象的最右边字符用来初始化bitset对象的低阶位。

### bitset对象上的操作

```C++
b.any();      //b中是否存在置为1的二进制位？
b.none();     //b中不存在置为1的二进制位吗？
b.count();    //b中置为1的二进制位的个数
b.size();     //b中二进制位的个数
b[pos];       //访问b中在pos处的二进制位
b.test(pos);  //b中在pos处的二进制位是否为1？
b.set();      //把b中所有二进制位都置为1
b.set(pos);   //把b中在pos处的二进制位置为1
b.reset();    //把b中把有二进制位都置为0
b.reset(pos); //把b中在pos处的二进制位置为0
b.flip();     //把b中所有二进制位逐位取反
b.flip(pos);  //把b中在pos处的二进制位逐位取反
b.to_ulong(); //用b中同样的二进制位返回一个unsigned long值
os << b ;     //把b中的位集输出到os流
```

## 数组

数组是由类型名、标识符和维数组成的复合数据类型，类型名规定了存放在数组中的元素的类型，而维数则指定数组中包含的元素个数。

> 维数的类型为size_t类型。

如果没有显式提供元素初值，则数组元素会像普通变量一样初始化：

- 在函数体外定义的内置数组，其元素均初始化为0；
- 在函数体内定义的内置数组，其元素无初始化；
- 不管数组在哪里定义，如果其元素为类类型，则自动调用该类的默认构造函数进行初始化；如果该类没有默认构造函数。则必须为该数组的元素提供显式初始化。

数组的下标的类型是size_t。

## 指针

__指针__就是保存的是另一个对象的地址。

### 指针初始化和赋值操作的约束

对指针进行初始化或赋值只能使用以下四种类型的值：

- 0值常量表达式。
- 类型匹配的对象的地址。
- 另一对象之后的下一地址。
- 同类型的另一个有效指针。

> 把int型变量赋给指针是非法的，尽管此int型变量的值可能为0。但允许把数值0或在编译时可获得0值的const量赋给指针。

预处理器变量`NULL`在`cstdlib`头文件中定义，其值为0。

> 预处理器变量不是在std命名空间中定义的，因此其名字应为NULL，而非std::NULL。

### void*指针

__vodi*__它可以保存任何类型对象的地址。

void*表明该指针与一地址值相关，但不清楚存储在此地址上的对象类型。

void*只支持有限的操作：与另一个指针进行比较；向函数传递void*指针或从函数返回void*指针；给另一个void*指针赋值。
不允许使用void*指针操纵它所指向的对象。

### 指针和const限定符

指向const对象的指针必须具有const特性。允许把非const对象的地址赋给指向const对象的指针。具有const特性的指针不允许赋值。

```C++
const double *cptr;
```

### const指针

const指针值不能改变。

```C++
int *const curerr= 0; //curerr是指向int型对象的const指针。
```

### 指向const对象的const指针

```C++
const double pi = 3.1415926;
const double *const pi_ptr = &pi;
```
### 指针和typedef

```
typedef string *pstring;
const pstring cstr;
//等价于
string *const cstr;
```

## C风格字符串的标准库函数

传递给这些标准库函数例程的指针必须具有非零值，并且指向以null结束的字符数组中的第一个元素。还有保证目标字符串足够大。

```C++
strlen(s);          //返回s的长度，不包括字符串结束符null
strcmp(s1, s2);     //比较两个字符串s1和s2是否相同。若s1与s2相等，返回0;若s1大于s2，返回正数；若s1小于s2，则返回负数
strcat(s1, s2);     //将字符串s2连接到s1后，并返回s1
strcpy(s1, s2);     //将s2复制给s1，并返回s1
strncat(s1, s2, n); //将s2的前n个字符连接到s1后面，并返回s1
strncpy(s1, s2, n); //将s2的前n个字符复制到s1，并返回s1
```

> 永远不要忘记字符串结束符null。调用者必须确保目标字符串具有足够的大小。使用strn函数处理C风格字符串。

## 动态数组

### 动态数组的定义

数组变量通过指定类型、数组名和维数来定义。而动态分配数组时，只需指定类型和数组长度，不必为数组对象命名，new表达式返回指向新分配数组的第一个元素的指针。

```C++
int *pia = new int[10];
```

### 初始化动态分配的数组

动态分配数组时，如果数组元素具有类类型，将使用该类的默认构造函数实现初始化；如果数组元素是内置类型，则无初始化。
可以使用跟在数组长度后面的一对空圆括号，对数组元素做值初始化。

```C++
string *psa = new string[10];   // 用构造函数初始化值
int *pia = new int[10];         //无初始化值
int *pia2 = new int[10]();      //全为0
```

> 对于动态分配的数组，其元素只能初始化为元素类型的默认值，而不能像数组变量一样，用初始化列表为数组元素提供各不相同的初值。

### const对象的动态数组

创建的数组存储了内置类型的const对象，则必须为这个数组提供初始化：因为数组元素都是const对象，无法赋值。

```C++
const int *pci_ok  = new const int[100]();
const string *pcs = new const string[100];
```

### 允许动态分配空数组

```C++
size_t n = get_size();
int *p = new int[n];
for (int *q = p; q != p+n; ++q)
```
### 动态空间的释放

动态分配的内存最后必须进行释放，否则，内在最终将会逐渐耗尽。
C++语言为指针提供`delete []`表达式释放指针指向的数组空间。

```C++
delete [] pia;
```

## 静态局部对象

_static局部对象(static local object)_

## 新旧代码的兼容

### 混合使用标准库类string和C风格字符串

`c_str`函数返回C风格字符串。

```C++
const char *str = st2.c_str();
```

### 使用数组初始化vector对象

使用数组初始化vector对象，必须指出用于初始化式的第一个元素以及数组最后一个元素的下一位置的地址。

```
const size_t arr_size = 6;
int int_arr[arr_size] = {0,1,2,3,4,5};
vector<int> ivec(int_arr,int_arr + arr_size);
```

## 多维数组

如果数组的元素又是数组，则称为二维数组，其每一维对应一个下标。

第一维通常称为行，第二维则称为列。

### 多维数组的初始化

```C++
int ia[3][4] = {
    {0,1,2,3},
    {4,5,6,7},
    {8,9,10,11}
};

int ia1[3][4] = {0,1,2,3,4,5,6,7,8,9,10,11};
```

### 指针和多维数组

```C++
int ia[3][4];
int (*ip)[4] = ia; //*ip是int[4]类型 -- 即ip是一个指向含有4个元素的数组的指针。
ip = &ia[2];
```
#### 用typedef简化指向多维数组的指针

```C++
typedef int int_array[4];
int_array *ip = ia;
for (int_array *p = ia; p != ia + 3; ++p)
    for (int *q = *p; q != *p + 4; ++q)
        cout << *q << endl;
```

## 表达式

一元操作符优先与二元操作符。

### sizeof操作符

sizeof操作符的作用是返回一个对象或类型名的长度，返回值的类型为size_t，长度的单位是字节。

```C++
sizeof (type name);
sizeof (expr);
sizeof expr;
```

使用sizeof的结果部分地依赖所涉及的类型：

- 对char类型或值为char类型的表达式做sizeof操作保证得1。
- 对引用类型做sizeof操作将返回存放此引用类型对象所需的内存空间大小。
- 对指针做sizeof操作将返回存放指针所需的内存大小;注意，如果要获取该指针所指向对象的大小，则必须对该指针进行解引用。
- 对数组做sizeof操作等效于将对其元素类型做sizeof操作的结果乘上数组元素的个数。因为sizeof返回整个数组在内存中的存储长度，所以用sizeof数组的结果除以sizeof其元素类型的结果，即可求出数组元素的个数。

## try块和异常处理

- throw表达式(throw expression)，错误检测部分使用这种表达式来说明遇到了不可处理的错误。可以说，throw_引发_了异常条件。
- try块(try block)，错误处理部分使用它来处理异常。try语句块以try关键字开始，并以一个或多个catch子句(catch clause)结束。在try块中执行的代码所抛出的异常，通常会被其中一个catch子句处理。由于它们“处理”异常，catch子句也称为_处理代码(handler)_。
- 由标准库定义的一组异常类，用来在throw和相应的catch之间传递有关的错误信息。

## 使用预处理器进行调试

### NDEBUG预处理变量

```C++
int main()
{
#ifndef NDEBUG
    cerr << "starting main" << endl;
#endif
}
```

如果NDEBUG未定义，那么程序就会将信息写到cerr中。如果NDEBUG已经定义了，那么程序执行时将会跳过#ifndef和#endif之间的代码。

可以通过定义NEDBUG预处理变量，（有效地）删除这些调试语句。

```C++
$ cc -DNDEBUG main.C
```

预处理器还定义了其余四种在调试时非常有用的常量：

- `_FILE_` 文件名
- `_LINE_` 当前选号
- `_TIME_` 文件被编译的时间
- `_DATE_` 文件被编译的日期

### assert预处理宏

```C++
assert(expr);
```

只要NDEBUG未定义，assert宏就求解条件表达式expr，如果结果为false，assert输出信息并终止程序的执行。如果该表达式有一个非零值，则assert不做任何操作。

## 控制流

- while、for以及do while语句，实现反复循环;
- if和switch，提供条件分支结构;
- continue，终止当次循环;
- break，退出一个循环或switch语句;
- goto，将控制跳转到某个标号语句;
- try、catch语句，实现try块的定义，该块语句包含一个可能抛出异常的语句序列，catch子句则用来处理在try块里抛出的异常;
- throw表达式，用于退出代码块的执行，将控制转移给相关的catch子句。

## 函数

在函数返回类型前回关键字_inline_就可以将函数指定为内联函数。

```C++
inline const string &functionname (){}
```

> 内联函数应该在头文件中定义，这一点不同于其他函数。

### 构造函数

```C++
class Sales_item {
Public:
Sales_item() : units_sold(0), revenue(0.0) {}
private:
std::string isbn;
unsigned units_sold;
double revenue;    
}
```

在冒号和花括号之间的代码称为_构造函数的初始化列表(constuctor initializer list)_。





-----





# CPP Primer Plus

## 头文件

```
#include <iostream> // 输入、输出
#include <cmath> or #include <math.h> //函数
#include <climits> or #include <limits.h> //整型限制信息 符号常量
#include <cfloat> or #include <float.h> //浮点类型限制信息
```

## 名称空间

```
using namespace std;

```

## 控制符

```
cout << // 输出
cin  >> // 输入
endl //换行
dec //十进制
oct //八进制
hex //十六进制
\  //转义字符
\u or \U  //通用字符名 \u后面是8个十六进制 \U后面是16个十六进制
#define //符号常量---预处理器方法
const  //常量的声明
auto   //声明自动变量
```

## C++源代码风格

- 每条语句占一行。
- 每个函数都有一个开始花括号和一个结束花括号，这两个花括号各占一行。
- 函数中的语句都相对于花括号进行缩进。
- 与函数名称相关的贺括号周围没有空白。

## 函数

### 函数格式

```
type functionname(argumentlist)
{
    statements
}
```

### 函数原型

```
type functionname(type)
```

### 函数特性


- 有函数头和函数体。
- 接受一个参数。
- 返回一个值。
- 需要一个原型。

### 方法

```
sizeof()
```

#### 成员函数

```
cout.put() //显示一个字符
```

## 访问名称空间std的方法

- 将using namespace std; 放在函数定义之前，让文件中所有的函数都能够使用名称空间std中所有的元素。
- 将using namespace std; 放在特定的函数定义中，让该函数能够使用名称空间std中的所有元素。
- 在特定的函数中使用类似using std::cout;这样的编译指令，而不是using namespace std;，让该函数能够使用指定的元素，如cout.
- 完全不使用编译指令using，而需要使用名称空间std中的元素时，使用前缀std::，如下所示：std::cout << "I'm using cout and endl from the std namespace" << std::endl;

## 数据类型

### 无符号类型

用unsigned来声明。

> `unsigned short change;`

### 整型short、int、long和long long

最小长度

- short至少16位
- int至少与short一样长
- long到少32位，且至少与int一样长
- long long到少64位，且到少与long一样长

### 整型字面值

- 第一位为1~9，则基数为10（十进制）；控制符dec
- 第一位为0，第二位为1~7，刚基数为8（八进制）；控制符oct
- 前两位为0x或0X，刚基数为16（十六进制）； 控制符hex

### char类型：字符和小整数

字符用单引号`""`,字符串用双引号`""`。

与int不同的是，char在默认情况下既不是没有符号，也不是有符号。

如果将`char`用作数值类型，刚`unsigned char`和`signed char`之间的差异将非常重要。`usigned char` 类型的表示范围通常为0~255，
而`signed char`的表示范围为-128~127。

### wchar_t（宽字符类型)

`wchar_t`也叫扩展字符集。它是一种整数类型。它和别一种整型（底层（underlying)类型）的长度和符号属性相同。

`wchar_t`用`wcin`和`wcout`作为输入、输出。用L表示wchar_t常量。

### char16_t 和 char32_t

用u表示`char16_t`常量。是无符号常量，长16位。

用U表示`char32_t`常量。是无符号常量，长32位。

### bool类型

`bool`类型的值可以为`true`（非0，1）或者`false`（0）。

### const限定符

`const`用于常量的声明

```
const type name = value;
```

### 浮点数

浮点数能够表示带有小数点的数字。

> `d.dddE+n` 指的是将小数点向右移n位，而`d.dddE-n`指的是将小数点向左移n位。

### 浮点类型

三种浮点类型：

- `float`至少32位，通常为32位
- `double`至少48位，通常为64位
- `long double`不少于`float`至少和`double`一样多，通常为80、96或128位

可从头文件cfloat(float.h)中找到系统的限制。

### 浮点常量

像8.24和2.4E8都属于double类型。

常量为`float`类型用f或F后缀。

常量为`long double`类型用l或L后缀。

### 将类型分类

C++对基本类型进行分类，形成了若干个族。类型`signed char`、`short``int`和`long`统称为符号整型;
它们的无符号版本统称为无符号整型；C++11新增了`long long`。`bool`、`char`、`wchar_t`、符号整数和无符号整型统称为整型;
C++11新增了`char16_t`和`char32_t`。`float`、`double`和`long double`统称为浮点型。整数和浮点型统称算术类型。

## C++算术运算符

C++提供了5种基本的算术计算：加法、减法、乘法、除法以及求模。

> 求模运算符只能用于整型，如果是浮点数将导致编译错误。如国其中一个是负数，则结果的符号满足以下规则：`(a/b)*b+a%b = a.`。

### 类型转换

C++自动执行很多类型转换：

- 将一种算术类型的值赋给另一种算术类型的变量时，C++将对值进行转换;
- 表达式中包含不同的类型时，C++将对值进行转换;
- 将参数传递给函数时，C++将对值进行转换;

#### 表达式类型转换

- 如果有一个操作数的类型是long double，则将另一个操作数转换为long double。
- 否则，如果有一个操作数的类型是double，则将别一个操作数换成double。
- 否则，如果有一个操作数的类型是float，则将另一个操作数转换成float。
- 在这种情况下，如果两个操作数都是有符号或无符号的，且其中一个操作数的级别比另一个低，则转换为级别高的类型。
- 如果一个操作数为有符号的，另一个操作数为无符号的，且无符号操作数的级别有符号操作数高，则将有符号操作数转换为无符号操作数所属的类型。
- 否则，如果有符号类型可表示无符号类型的所有可能取值，则将无符号操作数转换为有符号操作数所属的类型。
- 否则，将两个操作数都转换为有符号类型的无符号版本。

有符号整型按级别从高到低依次为long long 、long、int、short和signed char。
无符号整型的排列顺序与有符号整型相同。
类型char、signed char和unsigned char的级别相同。
类型bool的级别最低。
wchar_t、char16_t和char32_t的级别与其底层类型相同。

#### 强制类型转换

```
(typeName) value
typeName (value)
static_cast<typeName> (value)
```

### 数组

数组(array)是一种数据格式，能够存储多个同类型的值。

数组声明应该指出以下三点：

- 存储在每个元素中的值的类型;
- 数组名;
- 数组中的元素数。

声明数组的通用格式：

```
typeName arrayName[arraySize];  
//arraySize指定元素数目，它必须是整型常数或const值，也可以是常量表达式，即其中所有的值在编译时都是已知的。
//具体地说，arraySizei不能是变量，变量的值是在程序运行时设置的。
```
