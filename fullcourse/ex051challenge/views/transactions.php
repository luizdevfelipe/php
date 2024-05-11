<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $income = $expense = 0 ;
            $tot = count($$key); ?>
            <?php while ($i < $tot) : ?>
                <tr>
                    <td><?= date('M j, Y', strtotime($$key[$i]['date'])) ?></td>
                    <td><?= $$key[$i]['check_code'] ?></td>
                    <td><?= $$key[$i]['description'] ?></td>

                    <?php if ($$key[$i]['amount'] >= 0) : ?>
                        <td style="color:green;">
                        <?php $income += $$key[$i]['amount'] ?>
                        <?php else : ?>
                        <td style="color:red;">
                        <?php $expense += $$key[$i]['amount'] ?>
                        <?php endif; ?>
                        <?= str_replace('$-', '-$', '$' . $$key[$i]['amount']) ?>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?= '$'. $income?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><?= str_replace('$-', '-$', '$' . $expense)?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><?= str_replace('$-', '-$', '$' . $expense + $income) ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>