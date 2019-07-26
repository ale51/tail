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

別のターミナルで
```$echo ERROR 1234567890 >> test.log```を実行すると、標準出力にERROR 1234567890と表示されます。

## 課題
ただ、現状のコードだと、拡張性と再利用性に問題があるので、どうにかしたい。
今後、ERRORが発生した場合は、Slackに通知したり、FATALエラーの場合はパトランプを起動させたりするかもしれない。
例えば、main01.phpではERRORを検知して、Slack通知、main02.phpではFATALエラーでパトランプ的な

通知という観点で、拡張性と再利用性に優れたコードにリファクタリングしたいがどのようなコードにすればよいか。
