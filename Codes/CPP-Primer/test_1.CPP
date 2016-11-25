#include <iostream>
int main()
{
    //1.3
    //std::cout << "Hello,World" << std::endl;

    //1.4
    //int v1 , v2;
    //std::cin  >> v1 >> v2 ;
    //std::cout << v1 * v2 << std::endl;

    //1.5
    //std::cin  >> v1;
    //std::cin  >> v2;
    //std::cout << v1 * v2 
    //          << std::endl;

    //1.9 , 1.10
    //int sum = 0;
    //for (int i = 50; i <= 100; ++i)
    //{
    //    sum += i;
    //}
    //std::cout << sum << std::endl;
    //sum = 0;
    //int i = 50;
    //while (i<=100)
    //{
    //   sum += i;
    //    ++i;
    //}
    //std::cout << sum << std::endl;
    
    //1.11
    //int i = 10;
    //while ( i >= 0 )
    //{
    //    std::cout << i << std::endl;
    //    --i;
    //}
    //for (int j = 10; j >= 0; --j)
    //{
    //    std::cout << j << std::endl;
    //}

    //1.16
    //int v1,v2;
    //std::cin >> v1 >> v2;
    //if (v1 >= v2) {
    //    std::cout << v1 << std::endl;
    //} else {
    //    std::cout << v2 << std::endl;
    //}

    //读入未知数目的输入
    int sum = 0 , value;
    while (std::cin >> value)
        sum += value;
    std::cout << sum << std::endl;
    return 0;
}
