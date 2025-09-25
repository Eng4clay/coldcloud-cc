<?php
session_start();
require '../db_config.php';

// استقبال البيانات من النموذج
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// التحقق من المدخلات
if (empty($username) || empty($password)) {
  echo "⚠️ يرجى إدخال اسم المستخدم وكلمة المرور.";
  exit;
}

try {
  // البحث عن المستخدم في قاعدة البيانات
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  // التحقق من كلمة المرور
  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // إعادة التوجيه إلى لوحة التحكم
    header("Location: ../dashboard.php");
    exit;
  } else {
    echo "❌ بيانات الدخول غير صحيحة.";
    exit;
  }

} catch (PDOException $e) {
  echo "حدث خطأ أثناء الاتصال: " . $e->getMessage();
  exit;
}
