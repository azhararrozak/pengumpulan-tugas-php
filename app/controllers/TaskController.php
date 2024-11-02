<?php
    class TaskController {
        private $task;
        private $flashMessage = '';

        public function __construct($task){
            $this->task = $task;
        }

        public function handleForm(){
            if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];
                $tugasDipilih = $_POST['tugas'];
                $file = $_FILES['file'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $asal = $file['tmp_name'];
                $tujuan = "upload/" . $this->task->getConfig()['mapel'];
                $tujuan_file = "$tujuan/{$this->task->getConfig()['kelas']}_{$tugasDipilih}_{$nama}.$ext";
    
                if ($file['error'] <= 0 && $this->task->isFileValid($file, $ext)) {
                    if ($this->task->getConfig()['kirim_ulang'] || !file_exists($tujuan_file)) {
                        if (!is_dir($tujuan)) {
                            mkdir($tujuan, 0777, true);
                        }
                        move_uploaded_file($asal, $tujuan_file);
                        $this->flashMessage = $this->flash('success', "File tugas berhasil terkirim!");
                    } else {
                        $this->flashMessage = $this->flash('danger', "File sudah pernah dikirim. Mohon izin untuk kirim ulang.");
                    }
                } else {
                    $this->flashMessage = $this->flash('warning', "Format atau ukuran file tidak sesuai!");
                }
            }
    
            return $this->renderForm();
        }

        private function flash($status, $message)
        {
            return "<div class=\"alert alert-$status\" role=\"alert\">$message</div>";
        }

        private function renderForm()
        {
            $config = $this->task->getConfig();
            $flashMessage = $this->flashMessage;
            include '../app/views/task/index.php';
        }
    }
?>