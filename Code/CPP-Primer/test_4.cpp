#include <iostream>

using namespace std;
int main()
{
    //char a[7] = "abcdef";
    //cout << a[1] << endl;

    int ia[3][4] = {
        {0,1,2,3},
        {4,5,6,7},
        {8,9,10,11}
    };
    //int (*ip)[4] = ia;
    //cout << *ip[0] <<endl;
    //cout << *ip[1] <<endl;
    //cout << *ip[2] <<endl;
    //ip = &ia[2];
    //cout << *ip[0] <<endl;

    typedef int int_array[4];
    int_array *ip = ia;
    for (int_array *p = ia; p != ia + 3; ++p)
        for (int *q = *p; q != *p + 4; ++q)
            cout << *q << endl;

}
