## 起動方法

## autoloadファイル作成
```
$ composer install
```
または、
```
$ php composer.phar install
```

## ログファイル作成

main.phpファイルの内部でtest.logファイルを読み込むため、main.phpの同階層にtest.logが存在しないと、
エラーが発生します。

各自でtest.logを作成して起動させる必要があります。

## 実行
```$ php main.php```

別のターミナルで```echo ERROR 1234567890 >> test.log```

## 課題
通知と監視という観点で、拡張性に優れたコードにリファクタリングする。
