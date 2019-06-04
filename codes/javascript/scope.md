# JavaScript - Scope

```js
var n = 10,
    obj = {
      n: 20
    };
// n=10, obj.n=20

let fn = obj.fn = (function () {
  this.n++;
  n++;
  return function (m) {
    n += 10 + (++m);
    this.n += n;
    console.log(n);
  }
})(obj.n);
// n=12, obj.n=20

fn(10);
// n=66, obj.n=20
obj.fn(10);
// n=87, obj.n=107
console.log(n, obj.n); 
```
