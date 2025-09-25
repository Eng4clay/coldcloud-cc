<?php
header('Content-Type: application/json');

// دوال الحسابات الأساسية
function calculateCFM($area, $air_changes) {
  return round(($area * $air_changes) / 60, 2);
}

function calculateBTU($area, $cooling_factor = 25) {
  return round($area * $cooling_factor, 2);
}

function calculateACH($cfm, $room_volume) {
  return round(($cfm * 60) / $room_volume, 2);
}

// التحقق من الطلب
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // استقبال المدخلات
  $area = isset($_POST['area']) ? floatval($_POST['area']) : 0;
  $air_changes = isset($_POST['air_changes']) ? floatval($_POST['air_changes']) : 0;
  $volume = isset($_POST['volume']) ? floatval($_POST['volume']) : 0;

  // التحقق من القيم
  if ($area <= 0 || $air_changes <= 0 || $volume <= 0) {
    echo json_encode([
      'error' => 'يرجى إدخال قيم صحيحة لجميع الحقول.'
    ]);
    exit;
  }

  // تنفيذ الحسابات
  $cfm = calculateCFM($area, $air_changes);
  $btu = calculateBTU($area);
  $ach = calculateACH($cfm, $volume);

  // إرسال النتائج
  echo json_encode([
    'cfm' => $cfm,
    'btu' => $btu,
    'ach' => $ach
  ]);
  exit;
}

// إذا لم يكن الطلب POST
echo json_encode([
  'error' => 'طلب غير صالح.'
]);
