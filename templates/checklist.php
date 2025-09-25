<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>قائمة الفحص الدوري – Cold Cloud</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
  <h1>✅ قائمة مراجعة الصيانة</h1>
  <form method="POST" action="save.php">
    <input type="text" name="equipment" placeholder="اسم الجهاز" required />
    <select name="status">
      <option value="✅">✅ سليم</option>
      <option value="❌">❌ يحتاج صيانة</option>
    </select>
    <textarea name="notes" placeholder="ملاحظات"></textarea>
    <button type="submit">💾 حفظ</button>
    <button onclick="window.print()">🖨️ طباعة</button>
  </form>
</body>
</html>
