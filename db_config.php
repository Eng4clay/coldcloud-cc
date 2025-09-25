<?php
// إعدادات الاتصال بقاعدة البيانات
$host = 'localhost';           // اسم المضيف (غالبًا localhost)
$dbname = 'coldcloud';         // اسم قاعدة البيانات
$user = 'root';                // اسم المستخدم لقاعدة البيانات
$pass = '';                    // كلمة المرور (اتركها فارغة إذا كنت تعمل محليًا بدون كلمة مرور)

try {
  // إنشاء الاتصال باستخدام PDO
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

  // تفعيل وضع الأخطاء الاستثنائية
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  // في حالة فشل الاتصال
  die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>
