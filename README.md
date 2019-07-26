## 起動方法

## autoloadファイル作成
```
$ composer install
```

## ログファイル作成

main.phpファイル内に```$tail = new ErrorTail("./test.log");```
という式があるますが、test.logは存在しないので、エラーが発生します。

各自でtest.logを作成して起動させる必要があります。

## 実行
```$ php main.php```

別のターミナルで```echo ERROR 1234567890 >> test.log```


