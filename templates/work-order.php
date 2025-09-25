<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>نموذج أمر عمل – Cold Cloud</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
  <h1>📋 نموذج أمر عمل</h1>
  <form method="POST" action="save.php">
    <input type="text" name="client_name" placeholder="اسم العميل" required />
    <textarea name="service_details" placeholder="تفاصيل الخدمة" required></textarea>
    <button type="submit">💾 حفظ النموذج</button>
    <button onclick="window.print()">🖨️ طباعة</button>
  </form>
</body>
</html>
