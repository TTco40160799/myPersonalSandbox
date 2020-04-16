# git-flowについて
### つまり、何？
- Gitを使いながら開発していく時のルール
- グループで開発するため「ブランチをどう切るか」を定めたルール

### 「git clone~で参画！」

### 6ブランチの定義
1. master
    - 文字通りの「master」
    - マージを行うだけのブランチ
    - デフォルトで作成される
2. develop
    - 開発の「もと」となるブランチ
    - ここから作業ブランチを切る
    - 直接コミットすることはない
    - masterから派生させるブランチ
3. feature
    - 作業するためのブランチ
    - ブランチ名は、変更内容がわかるようにすること
    - 1つの変更に対して1つのfeatureブランチ
    - developから派生させるブランチ
4. release
    - 文字通り「製品リリース」のためのブランチ
    - developから派生させるブランチ
    - リリース完了後、masterとdevelopにマージする＆masterにリリースタグ(verなど)をつける
5. hotfix
    - 緊急修正のためのブランチ
    - masterブランチから派生させる
    - 操作としてはreleaseブランチと同じ
6. support
    - オプションのブランチ：旧バージョンをサポートするためのブランチ
    - サポートが必要なバージョンのmasterブランチから派生、その後は独立
￼
￼

|作業内容|コマンド|起きること|
|------|--------|--------|
|初期化|git flow init|git flowの運用管理セットアップ|
|開発開始|git flow feature start ブ|開発ブランチを作成、checkout|
|開発終了|git flow feature finish ブ|開発ブランチをマージ、そのご削除して、developにcheckout|
|開発→リモートへ|git flow feature publish ブ|自分の変更分をリモートへpush|
|修正分を取り込む|git flow feature pull ブ|他人の修正分をローカルへpull|
|リリース準備開始|git flow release start ブ|developをベースにreleaseブランチを作成|
|修正のプッシュ|git flow release publish ブ|リリース準備完了|
|リリース|git flow release finish ブ|releaseをmasterにマージ、masterにリリース用タグ付け、developにマージをしてから、releaseブランチを削除|
|緊急対応の開始|git flow hotfix start ブ|masterをベースにhotfixを作成|
|緊急対応の終了|git flow hotfix finish ブ|developとmasterにマージをし、masterへタグ付け、hotfixを削除|


### 便利技
- git flow init -d
    - 5ブランチが全てデフォルトで作成される


### HOW TOまとめ
https://qiita.com/CarlBrown23/items/84a6c1ce82f602eaa5a6

### HELP集
##### git flow feature
```
git flow feature [list] [-v]
git flow feature start [-F] <name> [<base>]
git flow feature finish [-rFk] <name|nameprefix>
git flow feature publish <name>
git flow feature track <name>
git flow feature diff [<name|nameprefix>]
git flow feature rebase [-i] [<name|nameprefix>]
git flow feature checkout [<name|nameprefix>]
git flow feature pull <remote> [<name>]
```
##### git flow relase
```
git flow release [list] [-v]
git flow release start [-F] <version>
git flow release finish [-Fsumpk] <version>
git flow release publish <name>
git flow release track <name>
```
##### git flow hotfix
```
git flow hotfix [list] [-v]
git flow hotfix start [-F] <version> [<base>]
git flow hotfix finish [-Fsumpk] <version>
```
##### git flow support
```
git flow support [list] [-v]
git flow support start [-F] <version> <base>
```

# git hubについて
- 最初の接続〜git cloneまで
  - sshキー作成、コピー
  ```
  mkdir ~/.ssh
  cd ~/.ssh
  ssh-keygen -t rsa
  pbcopy < ~/.ssh/id_rsa.pub
  ```
  - git hubにて公開鍵の設定
  https://github.com/settings/ssh

  - configの作成
  ```
  touch ~/.ssh/config
  vi ~/.ssh/config

  # 以下の内容をconfigに貼り付け
  Host github
  User git
  Hostname github.com
  Port 22
  IdentityFile ~/.ssh/id_rsa
  ```

  - git hubとの連携
  ```
  git clone https://github.com/YOUR-USERNAME/YOUR-REPOSITORY
  ```