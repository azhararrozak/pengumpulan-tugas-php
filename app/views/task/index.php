<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Kirim Tugas</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1>Formulir Kirim Tugas <small>| INFORMATIKA - Azhar Arrozak</small></h1>
        <hr>
        <?php echo $flashMessage; ?>

        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" required placeholder="Tulis nama lengkap">
                </div>
            </div>
            <div class="form-group">
                <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($config['kelas']); ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="mapel" class="col-sm-2 control-label">Mata Pelajaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($config['mapel']); ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="tugas" class="col-sm-2 control-label">Tugas</label>
                <div class="col-sm-10">
                    <select class="form-control" name="tugas">
                        <?php foreach ($config['tugas'] as $option): ?>
                            <option value="<?php echo htmlspecialchars($option); ?>"><?php echo htmlspecialchars($option); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="file" class="col-sm-2 control-label">File Input</label>
                <div class="col-sm-10">
                    <input type="file" name="file" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
