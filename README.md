## 商品管理システム

### 環境構築手順

* Gitクローン
* .env.example をコピーして .env を作成
* MySQLかPostgreSQLのデータベース作成（名前：item_management）  
  ローカルでMAMPを使用しているのであれば、MySQL推奨
* .env にデータベース接続情報追加
```
例）
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=item_management
DB_USERNAME=root
DB_PASSWORD=root
```
* APP_KEY生成
```
$ php artisan key:generate
```
* Composerインストール
```
$ composer install
```
* フロント環境構築
```
$ npm install
$ npm run dev
```
* マイグレーション
```
$ php artisan migrate
```

### 新しいブランチの作成方法

// ① 最新（他者の変更も取り込まれている）のブランチに移動
git checkout main

// ② originをpullする
git pull origin main

// ③ チェックアウトする
git checkout -b {任意の名前}
例 git checkout -b feat/add-login-page
```



