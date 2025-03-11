<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0a0f1f;
            color: white;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background: #111827;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        h1 {
            margin-bottom: 20px;
        }
        .account-info {
            text-align: left;
            margin-bottom: 20px;
        }
        input[type="number"], input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
            background: #0f172a;
            color: white;
        }
        button {
            background-color: #16a34a;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #15803d;
        }
        .logout-button {
            background-color:76C807;
        }
        .logout-button:hover {
            background-color: #b91c1c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>BANK SYSTEM</h1>

        <div class="account-info">
            <p><strong>Account ID:</strong> {{ $account->id }}</p>
            <p><strong>Balance:</strong> ${{ number_format($account->balance, 2) }}</p>
        </div>

        <h3>Deposit</h3>
        <form action="{{ url('/deposit/' . $account->id) }}" method="POST">
            @csrf
            <input type="number" name="amount" placeholder="Enter amount to deposit" required min="1">
            <button type="submit">Deposit</button>
        </form>

        <h3>Withdraw</h3>
        <form action="{{ url('/withdraw/' . $account->id) }}" method="POST">
            @csrf
            <input type="number" name="amount" placeholder="Enter amount to withdraw" required min="1">
            <button type="submit">Withdraw</button>
        </form>

        <h3>Transfer</h3>
        <form action="{{ url('/transfer') }}" method="POST">
            @csrf
            <input type="number" name="from_account_id" placeholder="From Account ID" required>
            <input type="number" name="to_account_id" placeholder="To Account ID" required>
            <input type="number" name="amount" placeholder="Amount to transfer" required min="1">
            <button type="submit">Transfer</button>
        </form>

        <h3>Logout</h3>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
