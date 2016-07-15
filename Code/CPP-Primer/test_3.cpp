#include <iostream>
#include <string>
#include <vector>
using namespace std;
int main()
{

    //string s1;
    //每行输出一个单词
    //while(cin >> s1)
    //    cout << s1 << endl;
    //每行输出一行文本
    //while(getline(cin, s1))
    //    cout << s1 << endl;

    //cout << s1.size() << endl;
    string word;
    vector<string> text;
    //while (cin >> word){
    //    text.push_back(word);
    //    cout << text[0] << endl;
    //}
    text.push_back("one");
    text.push_back("2");
    text.push_back("3");
    text.push_back("4");
    text.push_back("5");
    text.push_back("6");
    text.push_back("7");
    text.push_back("8");
    vector<string>::iterator iter = text.begin();
    cout << *iter << endl;
    return 0;
}
