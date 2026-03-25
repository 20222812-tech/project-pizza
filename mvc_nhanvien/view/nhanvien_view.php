<!DOCTYPE html>
<html>
<head>
    <title>Danh sách nhân viên</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Danh sách nhân viên</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Chức vụ</th>
        </tr>
        <?php foreach ($nhanviens as $nv): ?>
        <tr>
            <td><?= $nv["id"] ?></td>
            <td><?= $nv["name"] ?></td>
            <td><?= $nv["major"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
