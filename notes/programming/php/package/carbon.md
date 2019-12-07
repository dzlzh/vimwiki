# [Carbon](https://github.com/briannesbitt/carbon)

```php
<?php
Carbon::create('2019', '12', '27', '12', '59', '52', 'Asia/Taipei'); // 构造完整的时分秒
Carbon::createFromDate('2019', '12', '27','Asia/Taipei');            // 根据时区构造年月
Carbon::createFromTime('12', '59', '52');                            // 给当前时间构造时分秒
Carbon::createFromFormat('Y/m/d H', '2019/05/21 22');                // 构造指定格式的时间
Carbon::createFromTimeStamp(1545877701,'Asia/Taipei');               // 指定时间戳和时区构建时间

Carbon::parse('2019-12-07');                                         // 解析时间
Carbon::parse('1999-01-01')->age;

Carbon::now();                                                       // 获取当前时间
Carbon::today();                                                     // 获取今天时间
Carbon::tomorrow();                                                  // 获取明天的时间
Carbon::yesterday();                                                 // 获取昨天的时间

Carbon::now()->tzName;                                               // 获取当前时区
Carbon::now()->timestamp;                                            // 获取当前的时间戳
Carbon::now()->year;                                                 // 获取当前的年
Carbon::now()->month;                                                // 获取当前的月
Carbon::now()->day;                                                  // 获取当前的日
Carbon::now()->hour;                                                 // 获取当前的时
Carbon::now()->minute;                                               // 获取当前的分
Carbon::now()->second;                                               // 获取当前的秒
Carbon::now()->micro;                                                // 获取当前的毫秒
Carbon::now()->dayOfWeek;                                            // 获取当前时间是这周的第几天
Carbon::now()->dayOfYear;                                            // 获取当前时间是今年的第几天
Carbon::now()->weekOfMonth;                                          // 获取当前时间所以在周是当前月的第几周
Carbon::now()->weekOfYear;                                           // 获取当前时间所以在周是当前年的第几周
Carbon::now()->daysInMonth;                                          // 获取当月是多少天

Carbon::now()->startOfDay();                                         // 今天开始时间
Carbon::now()->endOfDay();                                           // 今天结束时间
Carbon::now()->startOfWeek();                                        // 这周开始时间
Carbon::now()->endOfWeek();                                          // 这周结束时间
Carbon::now()->startOfMonth();                                       // 这月开始时间
Carbon::now()->endOfMonth();                                         // 这月开始时间

Carbon::now()->toDateTimeString();                                   // 获取当前的时间
Carbon::now()->toDateString();                                       // 获取当前的日期

Carbon::parse('2019-12-07')->isWeekday();                            // 是否是工作日
Carbon::parse('2019-12-07')->isWeekend();                            // 是否是休息日
Carbon::parse('2019-12-07')->isYesterday();                          // 是否是昨天
Carbon::parse('2019-12-07')->isToday();                              // 是否是今天
Carbon::parse('2019-12-07')->isTomorrow();                           // 是否是明天
Carbon::parse('2019-12-07')->isBirthday();                           // 今天是否是生日

Carbon::now()->modify('+25 days');                                   // 当前时间加 25 天
Carbon::now()->modify('-25 days');                                   // 当前时间减 25 天
Carbon::now()->addDays(25);                                          // 当前时间加 25 天
Carbon::now()->subDays(25);                                          // 当前时间减 25 天
Carbon::now()->addWeeks(25);                                         // 当前时间加 25 周
Carbon::now()->subWeeks(25);                                         // 当前时间减 25 周
Carbon::now()->addHours(25);                                         // 当前时间加 25 小时
Carbon::now()->subHours(25);                                         // 当前时间减 25 小时

/**
 * 两个时间比较
 * min –返回最小日期。
 * max – 返回最大日期。
 * eq – 判断两个日期是否相等。
 * gt – 判断第一个日期是否比第二个日期大。
 * lt – 判断第一个日期是否比第二个日期小。
 * gte – 判断第一个日期是否大于等于第二个日期。
 * lte – 判断第一个日期是否小于等于第二个日期。
 */
```
