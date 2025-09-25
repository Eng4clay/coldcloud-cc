<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>فاتورة – Cold Cloud</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
  <h1>🧾 إنشاء فاتورة</h1>
  <form method="POST" action="save.php">
    <input type="text" name="client_name" placeholder="اسم العميل" required />
    <input type="text" name="item" placeholder="الخدمة أو المنتج" required />
    <input type="number" name="price" placeholder="السعر" required />
    <button type="submit">💾 حفظ</button>
    <button onclick="window.print()">🖨️ طباعة</button>
  </form>
</body>
</html>
