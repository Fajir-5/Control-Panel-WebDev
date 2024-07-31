<?php
    // الاتصال بقاعدة البيانات
    $servername = "YOUR_SERVERNAME";
    $username = "YOUR_USERNAME";
    $password = "YOUR_PASSWORD";
    $dbname = "YOUR_DBNAME"; // اسم قاعدة البيانات

    // إنشاء الاتصال
    $conn = new mysqli($servername, $username, $password, $dbname);

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }

    // الحصول على الاتجاه من الطلب
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $direction = $_POST['direction'];

        // إدخال الاتجاه في قاعدة البيانات باستخدام الجدول المحدد
        $sql = "INSERT INTO directions (directions) VALUES ('$direction')";

        if ($conn->query($sql) === TRUE) {
            echo "تم إرسال الأمر: $direction";
        } else {
            echo "خطأ: " . $sql . "<br>" . $conn->error;
        }
    }

    // إغلاق الاتصال
    $conn->close();
    ?>
</body>
</html>
