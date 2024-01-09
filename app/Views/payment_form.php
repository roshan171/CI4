<!-- app/Views/payment_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<form action="<?= base_url('payment/processPayment') ?>" method="post">
    <label for="amount">Enter Amount (INR):</label>
    <input type="text" name="amount" required>
    <button type="submit">Pay with Razorpay</button>
</form>

<?php if (isset($order)) : ?>
    <script>
        var options = {
            key: '<?= $order['id'] ?>', // Your Razorpay key ID
            amount: <?= $order['amount'] ?>,
            currency: 'INR',
            name: 'Your Company Name',
            description: 'Product or service description',
            order_id: '<?= $order['id'] ?>',
            handler: function(response) {
                alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
            },
            prefill: {
                name: 'Your Name',
                email: 'your.email@example.com',
                contact: '9876543210'
            },
            notes: {
                address: 'Your Address'
            },
            theme: {
                color: '#F37254'
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    </script>
<?php endif; ?>

</body>
</html>
