# 数据结构

在计算机中，**数据结构**（英语：data structure）是计算机中存储、组织数据方式。

数组结构意味着接口或封闭：一个数据结构可被视为两个函数之间的接口，或者是由数据类型联合组成的存储内容的访问方法封装。

大多数数据结构都由数列、记录、可辨识联合、引用等基本类型构成。举例而言，可为空的引用（nullable reference）是引用与可辨识联合的结合体，而最简单的链式结构链表则是由记录与可空引用构成。

> 摘自维基百科——[数据结构](https://zh.wikipedia.org/wiki/%E6%95%B0%E6%8D%AE%E7%BB%93%E6%9E%84)

## 线性表

**线性表（linear list）**是数据结构中最简单，同时也是最常用的一种结构。

* **ADT** 线性表（List）

* **Data**

  线性表的数据对象集合为 {a<sub>1</sub>, a<sub>2</sub>, ..., a<sub>n</sub>}，每个元素的类型均为 DataType。其中，除第一个元素 a<sub>1</sub> 外，每一个元素有且只有一个直接前驱元素，除了最后一个元素 a<sub>n</sub>外，每一个元素有且只有一个直接后继元素。数据元素之间的关系是一对一的关系。

* **Operation**

  * `InitList(*L)`：初始化操作，建立一个空的线性表 L。
  * `ListEmpty(L)`：判断线性表是否为空表，若线性表为空，返回 true，否则返回 false。
  * `ClearList(*L)`：将线性表清空。
  * `GetElme(L, i, *e)`：将线性表 L 中的第 i 个位置元素返回给 e。
  * `LocateElem(L, e)`：在线性表 L 中查找与给定值 e 相等的元素，如果查找成功，返回元素在表中序号表示成功；否则，返回 0 表示失败。
  * `ListInsert(*L, i, e)`：在线性表 L 中第 i 个位置插入新元素 e。
  * `ListDelete(*L, i, *e)`：删除线性表 L 中第 i 个位置元素，并用 e 返回其值。
  * `ListLength(L)`：返回线性表 L 的元素个数。

* **endADT**

线性表由零个或多个数据元素组成的有限序列。

第一个元素无前驱，而最后一个元素无后继，其他元素都有且只有一个前驱和后继。

线性表是由**相同数据类型**的n个数据元素 a<sub>0</sub>，a<sub>1</sub>，... a<sub>n−1</sub>组成的有限序列。一个数据元素可以由若干个数据项组成。若用L命名线性表，则其一般表示如下：

*L* = (a<sub>0</sub>，a<sub>1</sub>，...，a<sub>n-1</sub>)

其中，a<sub>0</sub>是唯一的“第一个”数据元素，又称为表头元素；a<sub>n-1</sub>是唯一的”最后一个“数据元素，又称表尾元素。

线性表个数为 0 时，称为空表。

线性表按照存储结构，可分为**顺序表**和**链表**两种类型。

### 顺序表

顺序表是在计算机内存中以数组形式保存的线性表，是指用一组地址连续的存储单元依次存储数据元素的线性结构。

顺序表是线性表的一种顺序存储形式。换句话说，线性表是逻辑结构，表示元素之间一对一的相邻关系；而顺序表是指存储结构，是指用一组地址连续的存储单元，依次存储线性表中的数据元素，从而使得逻辑上相邻的两个元素在物理位置上也相邻。

设顺序表的第一个元素 a<sub>0</sub> 的存储地址为 *Loc*(a<sub>0</sub>)，每个元素占*d*个存储空间，则第i个元素的地址为：

*Loc*(a<sub>i-1</sub>) = *Loc*(a<sub>0</sub>) + (i - 1) * *d*

顺序表在程序中通常用一维数组实现，一维数组可以是静态分配的，也可以是动态分配的。

在静态分配时，由于数组的大小和空间是固定的，一旦空间占满，就无法再新增数据，否则会导致数据溢出。

而在动态分配时，存储数组的空间在程序执行过程中会动态调整大小，当空间占满时，可以另行开辟更大的存储空间来为储存数据。

线性表的顺序存储结构，在存、读数据时，不管是哪个位置，时间复杂度都是 *O*(1)。而在插入或删除时，时间复杂度都是 *O*(n)。

顺序表最主要的特点是可以进行**随机访问**，即可以通过表头元素的地址和元素的编号（下标），在 *O*(1) 的时间复杂度内找到指定的元素。

顺序表的不足之处是插入和删除操作需要移动大量的元素，从而保持逻辑上和物理上的连续性。

**优点**

- 无须为表示表中元素之间的逻辑关系而增加额外的存储空间。
- 可以快速地存取表中任意位置的元素。

**缺点**

- 插入和删除操作需要移动大量元素。
- 当线性表长度变化较大时，难以确定存储空间的容量。
- 容易造成存储空间的“碎片”。

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

存储数据元素信息的域称为数据域，把存储直接反继位置的域称为指针域。指针域中存储的信息称为指针或链。这两部分信息组成数据元素存储映像，称为结点（Node）。

**特点**

- 元素之间前后依赖，串联而成。
- 元素不能随机访问。
- 元素前面和后面不会出现多个元素相连的情况。

#### 单链表

链表的每个结点中只包含一个指针域，所以叫做单链表。

链表中的第一个结点的存储位置叫做头指针，最后一个结点指针为空（NULL）。

**头指针**

- 头指针是指链表指向第一个结点的指针，若链表有头结点，则是指向头结点的指针。
- 头指针具有标识作用，所以常用头指针冠以链表的名字（指针变量的名字）。
- 无论链表是否为空，头指针均不为空。
- 头指针是链表的必要元素。

**头结点**

- 头结点是为了操作的统一和方便而设立的，放在第一个元素的结点之前，其数据域一般无意义（但也可以用来存放链表的长度）。
- 有了头结点，对在第一元素结点前插入结点和删除第一结点起操作与其它结点的操作就统一了。
- 头结点不一定是链表的必须要素。

```c++
#include<iostream>
using std::cout;
using std::endl;
class Node {
public:
    int data;
    Node* next;
    Node(int _data) {
        data = _data;
        next = NULL;
    }
};
class LinkedList {
private:
    Node* head;
public:
    LinkedList() {
        head = NULL;
    }
    ~LinkedList() {
        Node *current_node = head;
        while (current_node != NULL) {
            Node *delete_node = current_node;
            current_node = current_node->next;
            delete delete_node;
        }
    }
    void insert(Node *node, int index)
    {
        if (head == NULL) {
            if (index != 0) {
                return;
            }
            head = node;
            return;
        }
        if (index == 0) {
            node->next = head;
            head = node;
            return;
        }
        Node *current_node = head;
        int count = 0;
        while (current_node->next != NULL && count < index - 1) {
            current_node = current_node->next;
            count++;
        }
        if (count == index - 1) {
            node->next = current_node->next;
            current_node->next = node;
        }
    }
    void output()
    {
        if (head == NULL) {
            return;
        }
        Node *current_node = head;
        while (current_node != NULL) {
            cout << current_node->data << " ";
            current_node = current_node->next;
        }
        cout << endl;
    }
    void delete_node(int index)
    {
        if (head == NULL) {
            return;
        }
        Node *current_node = head;
        int count = 0;
        if (index == 0) {
            head = head->next;
            delete current_node;
            return;
        }
        while (current_node->next != NULL && count < index - 1) {
            current_node = current_node->next;
            count++;
        }
        if (count == index - 1 && current_node->next != NULL) {
            Node *delete_node = current_node->next;
            current_node->next = delete_node->next;
            delete delete_node;
        }
    }
    
    void reverse()
    {
        if (head == NULL) {
            return;
        }
        Node *next_node, *current_node;
        current_node = head->next;
        head->next = NULL;
        while (current_node != NULL) {
            next_node = current_node->next;
            current_node->next = head;
            head = current_node;
            current_node = next_node;
        }
    }

};
int main() {
    LinkedList linkedlist;
    for (int i = 1; i <= 10; i++) {
        Node *node = new Node(i);
        linkedlist.insert(node, i - 1);
    }
    linkedlist.output();
    linkedlist.delete_node(8);
    linkedlist.output();
    linkedlist.reverse();
    linkedlist.output();
    return 0;
}
```

#### 双向链表

双向链表也叫双链表。单链表里的指针域只记录了结点的下一个结点，也就是后继结点，而双向链表的指针域还记录了结点的上一个结点，也就是前驱结点。有了这个结构，我们可以从头结点遍历到尾结点，也可以从尾结点遍历到头结点了。

#### 循环链表

相比单链表，循环链表不同的是它将最后一个结点的指针指向了头结点，这样的结构使得链表更加灵活方便。循环链表里没有空指针，所以在判断结束条件时，不再是判断指针是否为空，而是判断指针是否等于某固定指针。另外，在单链表里，一个节点只能访问到它后面的结点，而在循环链表里它可以访问到所有的结点。

```c++
#include<iostream>
using std::cin;
using std::cout;
using std::endl;
class Node {
public:
    int data;
    Node* next;
    Node(int _data) {
        data = _data;
        next = NULL;
    }
};
class LinkedList {
private:
    Node* head;
public:
    LinkedList() {
        head = NULL;
    }
    ~LinkedList() {
        if (head == NULL) {
            return;
        }
        Node *current_node = head->next;
        head->next = NULL;
        while (current_node != NULL) {
            Node *delete_node = current_node;
            current_node = current_node->next;
            delete delete_node;
        }
    }
    void insert(Node *node, int index) {
        if (head == NULL) {
            if (index != 0) {
                return;
            }
            head = node;
            head->next = head;
            return;
        }
        if (index == 0) {
            node->next = head->next;
            head->next = node;
            return;
        }
        Node *current_node = head->next;
        int count = 0;
        while (current_node != head && count < index - 1) {
            current_node = current_node->next;
            count++;
        }
        if (count == index - 1) {
            node->next = current_node->next;
            current_node->next = node;
        }
        if (node == head->next) {
            head = node;
        }
    }

    void output_josephus(int m)
    {
        Node *current_node = head;
        head = NULL;
        while (current_node->next != current_node) {
            for (int i = 1; i < m; i++) {
                current_node = current_node->next;
            }
            cout << current_node->next->data << " ";
            Node *delete_node = current_node->next;
            current_node->next = current_node->next->next;
            delete delete_node;
        }
        cout << current_node->data << endl;
        delete current_node;
    }
};
int main() {
    LinkedList linkedlist;
    int n, m;
    cin >> n >> m;
    for (int i = 1; i <= n; i++) {
        Node *node = new Node(i);
        linkedlist.insert(node, i - 1);
    }
    linkedlist.output_josephus(m);
    return 0;
}
```



