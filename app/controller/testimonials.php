<?php

class Testimonials extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->testimonialsModel = $this->model('testimonial');
	}


    public function index()
	{
		$this->data['testimonials'] = $this->testimonialsModel->getAll();
        $this->data['sortlist'] = '../app/view/sortlist.php';;
		$this->view('index', $this->data);
	}

    public function sort()
    {
        $this->data['testimonials'] = $this->testimonialsModel->getAll($_POST['sort']);
        //$this->view('index', $this->data);
        $data['sortview'] = $this->render('sortlist', $this->data);;
        echo json_encode($data);
    }

    public function preview()
    {
        $now = date('Y-m-d H:i');
        $picture ='';
        if ( isset($_POST['pictureTmp']) && !empty($_POST['pictureTmp']) ) {
            $picture ='<img class="comment-image" src="' . $_POST['pictureTmp'] .'" alt="Comment Picture" >';
        }
        $data['preview'] = '<p class="comment-text">' . clean($_POST['comment']) . '</p>
                            ' . $picture . '
                            <hr> 
                            <p class="comment-author">' . clean($_POST['username']) . '(' . $_POST['email'] . ';' . $_POST['phone'].  ')</p>
                            <p class="comment-date">' . $now . '</p>';
        echo json_encode($data);
    }

	public function add()
	{
		if ( isset($_POST)  && !empty($_POST) ) {
            if ( isset($_FILES['picture']) && !empty($_FILES['picture']['tmp_name']) ) {
                $name = time() . '_' . $_FILES['picture']['name'];
                if(!upload($_FILES['picture'], $name)) {
                    $_SESSION['error'] = 'Не возможно загрузить файл!';
                    redirect('/');
                } else {
                    $_POST['picture'] = $name;
                }
            }
            unset($_POST['pictureTmp']);
            $_POST['phone'] = '+(375) ' . $_POST['phone'];
            $id = $this->testimonialsModel->add($_POST);
			if ( $id ) {
				$_SESSION['message'] = 'Ваш комментарий добавлен и будет опубликован после проверки.';
				redirect('/');
			}
		}
	}

    public function edit($id = null)
    {
        if(!isset($_SESSION['user']))
            $this->show404();

        $id = (int)$id;
        $id || $this->show404();

        if ( isset($_POST) && !empty($_POST) ) {
            $data['comment'] = $_POST["comment"];
            $data['modified_at'] = date('Y-m-d H:i');
			if ( $this->testimonialsModel->update($data, $id) ) {
                $_SESSION['message'] = 'Сохранения изменены.';
                redirect('/');
            }
		}


        $this->data['comment'] = $this->testimonialsModel->read($id);

        $this->view('edit', $this->data);
    }

    public function remove($id = null)
    {
        if(!isset($_SESSION['user']))
            $this->show404();
        $id = (int)$id;
        $id || $this->show404();

        $comment = $this->testimonialsModel->read($id);
        if(!empty($comment['picture'])){
            $picture_file = ROOT . '/pub/images/'. $comment['picture'];
            if(file_exists($picture_file)) {
                unlink($picture_file);
            }
        }
        if ( $this->testimonialsModel->delete($id) ) {
            $_SESSION['message'] = "Комментарий успешно удалён";
        }
        redirect('/');
    }

    public function hide($id = null)
    {
        if(!isset($_SESSION['user']))
            $this->show404();

        $id = (int)$id;
        $id || $this->show404();

        $data['published'] = 0;
        if ( $this->testimonialsModel->update($data, $id) ) {
            $_SESSION['message'] = 'Комментарий успешно скрыт';
        }
        redirect('/');
    }

    public function show($id = null)
    {
        if(!isset($_SESSION['user']))
            $this->show404();

        $id = (int)$id;
        $id || $this->show404();

        $data['published'] = 1;
        if ( $this->testimonialsModel->update($data, $id) ) {
            $_SESSION['message'] = 'Комментарий успешно опубликован';
        }
        redirect('/');
    }
}
