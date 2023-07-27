<?php


class Admin extends Container
{
    public function index()
    {
        $twig = $this->twig();
        if (isset($_SESSION['k']) && $_SESSION['k'] == true) {
            $this->callback();
        } else {
            echo $page = $twig->render('admin/pages/login.twig');
        }
    }

    public function login()
    {
        $pdo = $this->connectDB();
        $a = $pdo->prepare('select * from admin WHERE login = ?');
        $a->bindParam(1, $_POST['login']);
        $a->execute();
        $array = $a->fetch(PDO::FETCH_ASSOC);
        print_r($array);
        if (!empty($array)) {
            if (password_verify($_POST['password'], $array['password'])) {
                $_SESSION['k'] = true;
                header('location: /@admin');
            } else {
                echo 'Dont correct password or login';
            }
        }
    }

    public function callback()
    {
        if (isset($_SESSION['k']) && $_SESSION['k'] == true) {
            $pdo = $this->connectDB();
            $a = $pdo->prepare('select * from callback');
            $a->execute();
            $array = $a->fetchAll(PDO::FETCH_ASSOC);
            $twig = $this->twig();
            $page = $twig->render('admin/pages/callbacklist.twig', ['list' => $array]);
            $page = $twig->render('admin/pages/dashboard.twig', ['content' => $page]);
            echo $page;
        } else {
            echo 'Not found';
        }
    }

    public function booking()
    {
        if (isset($_SESSION['k']) && $_SESSION['k'] == true) {
            $twig = $this->twig();
            $page = $twig->render('admin/pages/booking.twig');
            $page = $twig->render('admin/pages/dashboard.twig', ['content' => $page]);
            echo $page;
        } else {
            echo 'Not found';
        }
    }


    public function prof()
    {


        if (isset($_POST['add_employee'])) {
            $name = $_POST['name_employee'];
            $experience = $_POST['experience_employee'];

            if ($_FILES['image']['size'] > 0) {
                if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/gif" || $_FILES['image']['type'] == "image/png") {
                    $res = explode('.', $_FILES['image']['name']);
                    $res = array_reverse($res);

                    $filename = md5(uniqid()) . "." . $res[0];
                    $upl = move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $filename);

                    if ($upl == true) {
                        $pdo = $this->connectDB();
                        $a = $pdo->prepare('insert into employees (name, experience,photo) values (?,?,?)');
                        $a->bindParam(1, $name);
                        $a->bindParam(2, $experience);
                        $a->bindParam(3, $filename);
                        $a->execute();
                    }
                }
            }
        }



        if (isset($_SESSION['k']) && $_SESSION['k'] == true) {
            $twig = $this->twig();
            $page = $twig->render('admin/pages/prof.twig');
            $page = $twig->render('admin/pages/dashboard.twig', ['content' => $page]);
            echo $page;
        } else {
            echo 'Not found';
        }

}
    public function exit()
    {
        unset($_SESSION['k']);
        header('location: /@admin');
    }


}