<?php

namespace Beltoise\Controller;

use Beltoise\Model\RenovationManager;
use Beltoise\Model\RealisationManager;

class AdminController extends Controller
{
    public function showAllAction()
    {
        return $this->twig->render('Admin/admin.html.twig');
    }
}
