/*
	雪花算法（SnowFlake）
	由64bit组成的
	1. 第一位 - 占1bit，值始终为1
	2. 时间戳（毫秒级） - 占41bit，可容纳69年
	3. 工作机器ID - 占10bit，可容纳1024个节点
	4. 序列号 - 占12bit，可容纳4096个ID
*/
package snowflake

import (
	"errors"
	"sync"
	"time"
)

const (
	twepoch        = int64(1577808000000)             // 开始时间戳（2020-01-01）
	workeridBits   = uint(10)                         // 机器ID所占的位数
	sequenceBits   = uint(12)                         // 序列所占的位数
	workeridMax    = int64(-1 ^ (-1 << workeridBits)) // 支持的最大机器Id数量
	sequenceMax    = int64(-1 ^ (-1 << sequenceBits)) // 支持的最大序列数量
	workeridShift  = sequenceBits                     // 机器ID左移位数
	timestampShift = sequenceBits + workeridBits      // 时间戳左移位数
)

type Snowflake struct {
	sync.Mutex
	timestamp int64
	workerid  int64
	sequence  int64
}

func New(workerid int64) (*Snowflake, error) {
	if workerid < 0 || workerid > workeridMax {
		return nil, errors.New("workerid must be between 0 and 1023")
	}
	return &Snowflake{
		timestamp: 0,
		workerid:  workerid,
		sequence:  0,
	}, nil
}

func (s *Snowflake) Generate() int64 {
	s.Lock()

	now := time.Now().UnixNano() / 1000000
	if s.timestamp == now {
		s.sequence = (s.sequence + 1) & sequenceMax
		if s.sequence == 0 {
			for now <= s.timestamp {
				now = time.Now().UnixNano() / 1000000
			}
		}
	} else {
		s.sequence = 0
	}
	s.timestamp = now

	r := int64(((now - twepoch) << timestampShift) |
		(s.workerid << workeridShift) |
		(s.sequence))
	s.Unlock()
	return r
}
