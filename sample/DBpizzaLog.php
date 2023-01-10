<?php
//書き写すの間に合わなかったやつ（エラー出てる）

// Your code here!
//書き方はCSSと違うが思想は同じ
class Ppo{
    public static $avc = 456;
    //静的な変数　::で使えるようにするため
    const ppp = i; //　←定数
    // public(公共）はどこからでもアクセス許可　アクセス修飾子
    public function ert(){
        return 100;
    }
}

$ppo = new Ppo();
//クラスのコピーを持ってくる（インスタンス）演算子
echo Ppo::$ppo -> ert();
　　　　　　　//アロー演算子
echo Ppo::$avc ;
//スコープ演算子　クラス名::変数　か　関数名　のいずれか
//インスタンスを作らずに値に使うため
echo Ppo::PPP ;
?>
