<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 以下は自動販売機のお釣りを計算するプログラムです。
// 150円のお茶を購入した際のお釣りを計算して表示してください。
// 計算内容は関数に記述し、関数を呼び出して結果表示すること
// $yen と $product の金額を変更して計算が合っているか検証を行うこと

// 表示例1）
// 10000円札で購入した場合、
// 10000円札x0枚、5000円札x1枚、1000円札x4枚、500円玉x1枚、100円玉x3枚、50円玉x1枚、10円玉x0枚、5円玉x0枚、1円玉x0枚

// 表示例2）
// 100円玉で購入した場合、
// 50円足りません。

$yen = 500;   // 購入金額
$product = 150; // 商品金額

function calc($yen, $product) {

    // 購入金額と商品金額の差額を計算
    $change = $yen - $product;

    
    // 利用可能なお札・硬貨の種類と枚数を初期化
    $bills = [10000, 5000, 1000, 500, 100, 50, 10, 5, 1];
    $numOfBills = array_fill(0, count($bills), 0);

    // お釣りを計算
    for ($i = 0; $i < count($bills); $i++) {
        $numOfBills[$i] = floor($change / $bills[$i]);
        $change %= $bills[$i];
    }

    return [$bills,$numOfBills];
}

// 関数を呼び出してお釣りを計算
[$bills,$changeResult] = calc($yen, $product);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お釣り</title>
</head>
<body>
    <section>
        <!-- お釣りの表示 -->
        <?php
    if($yen >= $product){
        echo "{$yen}円札で購入した場合、<br/>";
        for ($i = 0; $i < count($changeResult); $i++) {
            if ($changeResult[$i] > 0) {
                echo "{$bills[$i]}円札x{$changeResult[$i]}枚";
            }
        }
    }else{
        echo "{$yen}円玉で購入した場合、<br/>";
        echo $product - $yen."円足りません。<br/>";
        return;
    }
        ?>
    </section>
</body>
</html>
