<?php
require '../vendor/autoload.php'; // تأكد من تثبيت Dompdf عبر Composer

use Dompdf\Dompdf;
use Dompdf\Options;

// التحقق من وجود محتوى التقرير
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report_content'])) {
  $html = $_POST['report_content'];

  // إعدادات Dompdf
  $options = new Options();
  $options->set('defaultFont', 'Arial');
  $options->set('isHtml5ParserEnabled', true);
  $options->set('isRemoteEnabled', true); // لتضمين الصور من الإنترنت إذا لزم

  $dompdf = new Dompdf($options);
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'portrait'); // حجم الورقة واتجاهها
  $dompdf->render();

  // إرسال الملف للتحميل
  $dompdf->stream("coldcloud_report.pdf", ["Attachment" => true]);
  exit;
} else {
  echo "⚠️ لا يوجد محتوى صالح للتصدير.";
}
