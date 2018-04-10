## 写真家情報[photographer_info]

### 設計図

|photographer_id "SERIAL NOT NULL PRIMARY KEY"|photographer_mailaddress "TEXT UNIQUE NOT NULL"|photographer_pw "VARCHAR(64) NOT NULL"|
|:-- |:-- |:-- |
|1|foo@example.com|password1|
|2|bar@example.com|password2|
|3|piyo@example.com|password3|

### CERAT文

```
CREAT TBALE photographer_info(
  photographer_id SERIAL NOT NULL PRIMARY KEY,
  photographer_mailaddress TEXT UNIQUE NOT NULL,
  photographer_pw VARCHAR(64) NOT NULL
  );
```


## イベント情報[event_info]

|event_id "SERIAL NOT NULL PRIMARY KEY"|event_name "TEXT NOT NULL "|event_key "TEXT NOT NULL"|event_start_day "TIMESTAMP NOT NULL"|event_end_day "TIMESTAMP NOT NULL"|
|:-- |:-- |:-- |:-- |:-- |
|1|event1|12346|2018-01-01 00:00:00|2028-01-01 00:00:00|
|3|event3|11111|2018-01-01 00:00:00|2028-01-01 00:00:00|
|4|event4|22222|2018-01-01 00:00:00|2028-01-01 00:00:00|

### CERAT文

```
CREAT TBALE event_info(
  event_id SERIAL PRIMARY KEY NOT NULL ,
  event_key TEXT NOT NULL,
  event_start_day TIMESTAMP NOT NULL,
  event_end_day TIMESTAMP NOT NULL
  );
```

## イベント担当情報[photo_charge]

|event_id "INTEGER PRIMARY KEY NOT NULL"|photographer_id "INTEGER  NOT NULL"|
|:-- |:-- |
|1|1|
|2|1|
|3|2|
|4|3|

### CERAT文

```
CREAT TBALE photo_charge(
  event_id INTEGER PRIMARY KEY NOT NULL,
  photographer_id INTEGER  NOT NULL
  );
```