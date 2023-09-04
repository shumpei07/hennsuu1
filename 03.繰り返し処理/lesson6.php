<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
<table>
        <tr>
            <th></th>
            <?php
            // 列ヘッダを生成
            $columns = array_keys(current($arr));
            foreach ($columns as $col) {
                echo "<th>{$col}</th>";
            }
            echo "<th>横合計</th>";
            ?>
        </tr>
        <?php
        // 行データを生成
        $totalRow = [];
        foreach ($arr as $rowName => $rowData) {
            echo "<tr><th>{$rowName}</th>";
            $rowTotal = 0;
            foreach ($rowData as $value) {
                echo "<td>{$value}</td>";
                $rowTotal += $value;
                if (!isset($totalRow[$rowName])) {
                    $totalRow[$rowName] = $value;
                } else {
                    $totalRow[$rowName] += $value;
                }
            }
            echo "<td>{$rowTotal}</td>";
            echo "</tr>";
        }

        // 縦合計行を生成
        echo "<tr><th>縦合計</th>";
        $grandTotal = 0;
        foreach ($columns as $col) {
            $colTotal = 0;
            foreach ($arr as $rowData) {
                $colTotal += $rowData[$col];
            }
            echo "<td>{$colTotal}</td>";
            $grandTotal += $colTotal;
        }
        echo "<td>{$grandTotal}</td></tr>";
        ?>
    </table>
</body>
</html>