<?php
session_start();
require '../db_config.php';

// التحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
  echo json_encode(['error' => 'يجب تسجيل الدخول أولاً.']);
  exit;
}

// استقبال البيانات من النموذج
$task_date = isset($_POST['task_date']) ? $_POST['task_date'] : null;
$task_name = isset($_POST['task_name']) ? trim($_POST['task_name']) : null;
$notes = isset($_POST['notes']) ? trim($_POST['notes']) : null;

// التحقق من المدخلات
if (!$task_date || !$task_name) {
  echo json_encode(['error' => 'يرجى إدخال تاريخ المهمة واسم المهمة.']);
  exit;
}

// تجهيز البيانات للتخزين
$user_id = $_SESSION['user_id'];
$type = 'maintenance-task';
$content = json_encode([
  'date' => $task_date,
  'name' => $task_name,
  'notes' => $notes
]);

// حفظ المهمة في قاعدة البيانات
try {
  $stmt = $pdo->prepare("INSERT INTO templates (user_id, type, content) VALUES (?, ?, ?)");
  $stmt->execute([$user_id, $type, $content]);

  echo json_encode(['success' => '✅ تم حفظ مهمة الصيانة بنجاح.']);
} catch (PDOException $e) {
  echo json_encode(['error' => 'حدث خطأ أثناء الحفظ: ' . $e->getMessage()]);
}
