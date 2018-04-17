## 写真家情報[photographer_info]

### ユーザー作成

CREATE ROLE role_name WITH LOGIN PASSWORD 'password'

### DB作成

CREATE DATABASE database_name OWNER dbowner_name;

### 設計図

|photographer_id "SERIAL NOT NULL PRIMARY KEY"|photographer_mailaddress "TEXT UNIQUE NOT NULL"|photographer_pw "VARCHAR(64) NOT NULL"|
|:-- |:-- |:-- |
|1|foo@example.com|password1|
|2|bar@example.com|password2|
|3|piyo@example.com|password3|

### CERAT文

```
CREATE TABLE photographer_info(
  photographer_id SERIAL NOT NULL PRIMARY KEY,
  photographer_mailaddress TEXT UNIQUE NOT NULL,
  photographer_pw VARCHAR(64) NOT NULL
  );
```


## イベント情報[event_info]

|event_id "SERIAL NOT NULL PRIMARY KEY"|event_name "TEXT NOT NULL "|event_key "TEXT NOT NULL"|event_start_day "TIMESTAMP NOT NULL"|event_end_day "TIMESTAMP NOT NULL"|photographer_id "INTEGER  NOT NULL"
|:-- |:-- |:-- |:-- |:-- |:--|
|1|event1|12346|2018-01-01 00:00:00|2028-01-01 00:00:00|1|
|3|event3|11111|2018-01-01 00:00:00|2028-01-01 00:00:00|1|
|4|event4|22222|2018-01-01 00:00:00|2028-01-01 00:00:00|3|

### CERAT文

```
CREATE TABLE event_info(
  event_id SERIAL PRIMARY KEY NOT NULL ,
  event_key char(16) UNIQUE NOT NULL,
  event_start_day DATE NOT NULL,
  event_end_day DATE NOT NULL,
  photographer_id INTEGER  NOT NULL
  );
```
