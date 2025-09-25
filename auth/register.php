<?php
require '../db_config.php';

// استقبال المدخلات من النموذج
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// التحقق من المدخلات
if (empty($username) || empty($email) || empty($password)) {
  echo "⚠️ يرجى تعبئة جميع الحقول المطلوبة.";
  exit;
}

// التحقق من صحة البريد الإلكتروني
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "❌ البريد الإلكتروني غير صالح.";
  exit;
}

// تشفير كلمة المرور
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
  // التحقق من عدم تكرار اسم المستخدم
  $check = $pdo->prepare("SELECT id FROM users WHERE username = ?");
  $check->execute([$username]);
  if ($check->rowCount() > 0) {
    echo "⚠️ اسم المستخدم مستخدم مسبقًا.";
    exit;
  }

  // إدخال المستخدم الجديد
  $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $stmt->execute([$username, $email, $hashed_password]);

  // إعادة التوجيه إلى صفحة الدخول
  header("Location: ../login.html");
  exit;

} catch (PDOException $e) {
  echo "حدث خطأ أثناء التسجيل: " . $e->getMessage();
  exit;
}
