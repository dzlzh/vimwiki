#include <iostream>
#include <cmath>
using namespace std;
void simon(int);
int main()
{    
    //1
    //cout << "Come up and C++ me some time , ";
    //cout << endl;
    //cout << "You won't regret it !" << endl;
    
    //2
    //int carrots;
    //cout << "How many carrots do you have?" << endl;
    //cin  >> carrots;
    //carrots = carrots + 2;
    //cout << "Now you have" << carrots << " carrots." <<endl;
    
    //3
    //double area;
    //cout << "Enter the floor area, in square feet, of your home: ";
    //cin  >> area;
    //double side;
    //side = sqrt(area);
    //cout << "That's the equivalent of a square " << side
    //     << " feet to the side." << endl;
    //cout << "How fascinating!" << endl;

    //4
    simon(3);
    cout << "Pick an integer: ";
    int count;
    cin  >> count;
    simon(count);
    cout << "Done!" << endl;   
    
    return 0;
}

void simon(int n)
{
    cout << "Simon says touch your toes " << n << " times." << endl;
}
