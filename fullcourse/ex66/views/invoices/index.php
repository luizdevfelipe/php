<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            border: 1px #eee solid;
            padding: 5px;
        }

        .color-green{
            color: green;
        }
        .color-red{
            color: red;
        }
        .color-orange{
            color: orange;
        }
        .color-yellow{
            color: yellow;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Invoice #</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice) : ?>
                <tr>
                    <td><?= $invoice->id ?></td>
                    <td><?= number_format($invoice->amount, 2) ?></td>
                    <td class="<?= \App\Enums\InvoiceStatus::tryFrom($invoice->status)->color()->getClass() ?>">
                    <?= \App\Enums\InvoiceStatus::tryFrom($invoice->status)->toString() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>