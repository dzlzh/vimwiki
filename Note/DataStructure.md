# 数据结构

在计算机中，**数据结构**（英语：data structure）是计算机中存储、组织数据方式。

数组结构意味着接口或封闭：一个数据结构可被视为两个函数之间的接口，或者是由数据类型联合组成的存储内容的访问方法封装。

大多数数据结构都由数列、记录、可辨识联合、引用等基本类型构成。举例而言，可为空的引用（nullable reference）是引用与可辨识联合的结合体，而最简单的链式结构链表则是由记录与可空引用构成。

> 摘自维基百科——[数据结构](https://zh.wikipedia.org/wiki/%E6%95%B0%E6%8D%AE%E7%BB%93%E6%9E%84)

## 线性表

**线性表（linear list）**是数据结构中最简单，同时也是最常用的一种结构。

线性表是由**相同数据类型**的n个数据元素 a<sub>0</sub>，a<sub>1</sub>，... a<sub>n−1</sub>组成的有限序列。一个数据元素可以由若干个数据项组成。若用L命名线性表，则其一般表示如下：

*L* = (a<sub>0</sub>，a<sub>1</sub>，...，a<sub>n-1</sub>)

其中，a<sub>0</sub>是唯一的“第一个”数据元素，又称为表头元素；a<sub>n-1</sub>是唯一的”最后一个“数据元素，又称表尾元素。

线性表按照存储结构，可分为**顺序表**和**链表**两种类型。

### 顺序表

顺序表是在计算机内存中以数组形式保存的线性表，是指用一组地址连续的存储单元依次存储数据元素的线性结构。

顺序表是线性表的一种顺序存储形式。换句话说，线性表是逻辑结构，表示元素之间一对一的相邻关系；而顺序表是指存储结构，是指用一组地址连续的存储单元，依次存储线性表中的数据元素，从而使得逻辑上相邻的两个元素在物理位置上也相邻。

设顺序表的第一个元素 a<sub>0</sub> 的存储地址为 *Loc*(a<sub>0</sub>)，每个元素占*d*个存储空间，则第i个元素的地址为：

*Loc*(a<sub>i-1</sub>) = *Loc*(a<sub>0</sub>) + (i - 1) * *d*

顺序表在程序中通常用一维数组实现，一维数组可以是静态分配的，也可以是动态分配的。

在静态分配时，由于数组的大小和空间是固定的，一旦空间占满，就无法再新增数据，否则会导致数据溢出。

而在动态分配时，存储数组的空间在程序执行过程中会动态调整大小，当空间占满时，可以另行开辟更大的存储空间来为储存数据。

顺序表最主要的特点是可以进行**随机访问**，即可以通过表头元素的地址和元素的编号（下标），在 *O*(1) 的时间复杂度内找到指定的元素。

顺序表的不足之处是插入和删除操作需要移动大量的元素，从而保持逻辑上和物理上的连续性。

```c++
#include <iostream>
#include <cstring>
using namespace std;
class Vector {
private:
    int size, length;
    int *data;
public:
    Vector(int input_size) {
        size = input_size;
        length = 0;
        data = new int[size];
    }
    ~Vector() {
        delete[] data;
    }
    bool insert(int loc, int value) {
        if (loc < 0 || loc > length) {
            return false;
        }
        if (length >= size) {
            return false;
        }
        for (int i = length; i > loc; --i) {
            data[i] = data[i - 1];
        }
        data[loc] = value;
        length++;
        return true;
    }
    int search(int value) {
        for (int i = 0; i < length; ++i) {
            if (data[i] == value) {
                return i;
            }
        }
        return -1;
    }
    bool remove(int index) {
        if (index < 0 || index >= length) {
            return false;
        }
        for (int i = index + 1; i < length; ++i) {
            data[i - 1] = data[i];
        }
        length = length - 1;
        return true;
    }
    void print() {
        for (int i = 0; i < length; ++i) {
            if (i > 0) {
                cout << " ";
            }
            cout << data[i];
        }
        cout << endl;
    }
};
int main() {
    Vector a(2);
    cout << a.insert(0, 1) << endl;
    cout << a.insert(0, 2) << endl;
    a.print();
    cout << a.remove(1) << endl;
    a.print();
    cout << a.search(0) << endl;
    cout << a.search(1) << endl;
    return 0;
}
```

### 链表

链表是一种常见的基础数据结构，是一种线性表，但是并不会按线性的顺序存储数据，而是在第一个节点里存到下一个节点的指针。由于不必按顺序存储，链表在插入的时候可以达到 *O*(1) 的复杂度，比另一种线性表顺序表快得多，但是查找一个节点或者访问特定编号的节点则需要 *O*(n) 的时间，而顺序表相应的时间复杂度分别是 *O*(logn) 和 *O*(1)。

**特点**

- 元素之间前后依赖，串联而成。
- 元素不能随机访问。
- 元素前面和后面不会出现多个元素相连的情况。

