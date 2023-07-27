<?php


class Home extends Container
{


    public function index()
    {

        $pdo = $this->connectDB();
        $a = $pdo->prepare('select * from employees');
        $a->execute();
        $array = $a->fetchAll(PDO::FETCH_ASSOC);

        $twig = $this->twig();
        $html = $twig->render('client/layouts/header.twig');
        $html .= $twig->render('client/pages/home.twig', ['employees' => $array]);
        $html .= $twig->render('client/layouts/footer.twig');
        echo $html;
    }

    public function callback()
    {
        if (isset($_POST['btn_call'])) {
            $number = $_POST['number'];
            $name = $_POST['name'];

            //date("Y-m-d H:i:s");

            $date = date('l jS \of F Y h:i:s A');
            $pdo = $this->connectDB();
            $a = $pdo->prepare('insert into callback (number,name,date) values (?,?,?)');
            $a->bindParam(1, $number);
            $a->bindParam(2, $name);
            $a->bindParam(3, $date);
            $a->execute();
        }
        header('location: /');
    }

    public function order()
    {
        $name = ARGUMENT;
        $pdo = $this->connectDB();
        $a = $pdo->prepare('select * from employees where id = ?');
        $a->bindParam(1, $name);
        $a->execute();
        $getName = $a->fetchAll(PDO::FETCH_ASSOC);


        $twig = $this->twig();
        $html = $twig->render('client/layouts/header.twig');
        $html .= $twig->render('client/pages/order.twig', ['name' => $getName]);
        $html .= $twig->render('client/layouts/footer.twig');
        echo $html;
    }


}