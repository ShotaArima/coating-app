# coating-app

# 仮想環境の立て方

## 1. Docker desktopを起動

## 2. sspcのコンテナの起動
  `docker start sspc`  
※dockerのコンテナの確認  
  `dokcer ps`

## 3. ファイルの転送
実行を確認後、ファイル転送プロトコルを通じてファイルを仮想サーバに格納します。  
今回はWinSCPを利用します。

## 4. 検証
ブラウザで実行画面を確認します。  
リンク : http://127.0.0.1:10800/~sspuser/coating-app/public/login.php
