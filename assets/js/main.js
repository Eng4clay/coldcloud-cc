document.addEventListener("DOMContentLoaded", () => {
  // التحقق من الحقول المطلوبة قبل الإرسال
  const forms = document.querySelectorAll("form");
  forms.forEach(form => {
    form.addEventListener("submit", e => {
      const requiredFields = form.querySelectorAll("input[required], textarea[required], select[required]");
      let valid = true;

      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          field.classList.add("error");
          valid = false;
        } else {
          field.classList.remove("error");
        }
      });

      if (!valid) {
        e.preventDefault();
        alert("⚠️ يرجى تعبئة جميع الحقول المطلوبة.");
      }
    });
  });

  // وظيفة الطباعة للنماذج
  const printButtons = document.querySelectorAll("button.print, .print-button");
  printButtons.forEach(btn => {
    btn.addEventListener("click", e => {
      e.preventDefault();
      window.print();
    });
  });

  // تنسيق تلقائي لحقل السعر
  const priceFields = document.querySelectorAll("input[name='price']");
  priceFields.forEach(field => {
    field.addEventListener("blur", () => {
      let value = parseFloat(field.value);
      if (!isNaN(value)) {
        field.value = value.toFixed(2);
      }
    });
  });

  // تنبيه بعد الطباعة
  window.onafterprint = () => {
    alert("📄 تم إرسال النموذج للطابعة.");
  };

  // تنبيه بعد الحفظ (إذا تم التوجيه مع ?saved=true)
  if (window.location.search.includes("saved=true")) {
    alert("✅ تم حفظ النموذج بنجاح.");
  }

  // تحسين تجربة التنقل داخل لوحة التحكم
  const navLinks = document.querySelectorAll("nav a");
  navLinks.forEach(link => {
    link.addEventListener("mouseenter", () => {
      link.style.opacity = "0.8";
    });
    link.addEventListener("mouseleave", () => {
      link.style.opacity = "1";
    });
  });
});
