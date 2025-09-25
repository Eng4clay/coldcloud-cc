<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>لوحة التحكم – Cold Cloud</title>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <header>
    <h1>مرحبًا <?= $_SESSION['username'] ?> 👋</h1>
    <nav>
      <a href="templates/work-order.php">📋 أمر عمل</a>
      <a href="templates/checklist.php">✅ قائمة فحص</a>
      <a href="templates/invoice.php">🧾 فاتورة</a>
      <a href="tools/calculator.html">🔢 الحاسبة الذكية</a>
      <a href="tools/scheduler.php">📅 مجدول الصيانة</a>
      <a href="tools/reports.php">📤 تصدير التقارير</a>
      <a href="auth/logout.php">🚪 تسجيل خروج</a>
    </nav>
  </header>

  <section>
    <p>اختر النموذج أو الأداة التي ترغب باستخدامها.</p>
  </section>

  <footer>
    <p>© 2025 السحابة الباردة – Cold Cloud</p>
  </footer>
</body>
</html>
