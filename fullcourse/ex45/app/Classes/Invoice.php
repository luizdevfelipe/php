<?php 
declare(strict_types=1);
namespace app\Classes;

class Invoice
{
    public function index():string
    {        
        setcookie(
            'userName',
            'Gio',
            time() - (60 * 60 * 24)
        );
        unset($_SESSION['count']);
        return 'Invoices';
        
        
    }

    public function create():string
    {
        return "<form method='post' action='/invoices/create'><label>Amount</label><input type='text' name='amount'></form>";
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}

?>