# GCP
## tutorial
### gcp tutorial
- create a project
- clone a git
- (check the soruces)
- type this below to open the port 8080;
```s
php -S localhost:8080
```
- create an app & deploy
```s
gcloud app create
gcloud app deploy
```
- check the URL in the message like this below
```s
File upload done.
Updating service [default]...done.
Setting traffic split for service [default]...done.
Deployed service [default] to [https://phptuto0001.df.r.appspot.com]

You can stream logs from the command line by running:
  $ gcloud app logs tail -s default

To view your application in the web browser run:
  $ gcloud app browse
```
- 


### App Engine用のGoogle Cloud プロジェクトの設定
- 通常、App Engineスタンダード環境にアプリをデプロイするには以下3つを事前に設定する
  1. Cloudプロジェクト
  2. App Engineアプリケーション
  3. 請求先アカウント

- 手順としては以下の通り
  - プロジェクトとアプリケーションの作成
  - 課金の有効化

- 例えばテスト環境を終了させるには
  - 「アプリケーションの設定」からアプリケーションを無効にするをクリック
  - プロジェクトのシャットダウン


