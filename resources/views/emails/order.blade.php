<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: 'Courier New', Courier, monospace;
      background-color: #f5f5f5;
      padding: 20px;
    }
    .receipt {
      background: #fff;
      width: 100%;
      max-width: 400px;
      margin: auto;
      padding: 20px;
      border: 1px dashed #000;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .receipt h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .receipt table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .receipt table td {
      padding: 8px 0;
    }
    .label {
      font-weight: bold;
    }
    .button {
      display: block;
      width: fit-content;
      margin: 0 auto;
      padding: 10px 20px;
      background-color: #007BFF;
      color: #fff !important;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      text-align: center;
    }
    .button:hover {
      background-color: #0056b3;
    }
    .divider {
      border-top: 1px dashed #000;
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <div class="receipt">
    <h2>Order Masuk</h2>
    <div class="divider"></div>
    <table>
      <tr>
        <td class="label">Nama Pemesan</td>
        <td>: {{ $order->user->name }}</td>
      </tr>
      <tr>
        <td class="label">Tanggal Pesanan</td>
        <td>: {{ $order->order_date }}</td>
      </tr>
      <tr>
        <td class="label">Total</td>
        <td>: Rp. {{ number_format($order->total_amount) }}</td>
      </tr>
    </table>
    <div class="divider"></div>
    <a href="{{ route('backend.orders.index') }}" class="button">Cek Sekarang</a>
  </div>
</body>
</html>
