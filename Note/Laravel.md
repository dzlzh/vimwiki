# Blade

**输出内容，被转义过的**

`{{ $var }}`

**输出未转义内容，5.0特性**

`{!! $var !!}`

**注释**

`{{-- 注释 --}}`

**三元表达式的简写，以下相当于「`$name ? $name : 'Default'`」**

`{{{ $name or 'Default'}}}`

**原样输出，以下会输出`{{ name }}`**

`@{{ name }}`



**区块占位**

`@yield('name')`

**扩展布局模板**

`@extends('layout.name')`

**实现命名为 name 的区块（yield 占位的地方**

`@section('name')`

`@stop`



**条件控制**

`@if`

`@else`

`@elseif`

`@endif`



**循环控制**

`@for`

`@endfor`



`@foreach`

`@endforeach`



`@while`

`@endwhile`

