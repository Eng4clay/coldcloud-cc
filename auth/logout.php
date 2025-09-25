<?php
session_start(); // بدء الجلسة

// حذف جميع بيانات الجلسة
$_SESSION = [];
session_unset();
session_destroy();

// إعادة التوجيه إلى صفحة تسجيل الدخول
header("Location: ../login.html");
exit;
