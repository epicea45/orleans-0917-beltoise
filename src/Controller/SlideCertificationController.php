<?php

namespace Beltoise\Controller;


use Beltoise\Model\SlideCertification;
use Beltoise\Model\SlideCertificationManager;
use Beltoise\Service\UploadImageManager;

class SlideCertificationController extends Controller
{
    /**
     * @return string
     */
    public function showAdminCertificationsAction()
    {
        $certification = new SlideCertification();
        $uploadErrors = [];

        if (!empty($_POST)) {
            $certification->setRole('CERTIFICATION');

            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageUpload($_FILES);

            if (empty($uploadErrors)) {
                $certification->setName($uploadImageManager->getImageName());

                $slideCertificationManager = new SlideCertificationManager();
                $slideCertificationManager->insert($certification);

                header('Location: index.php?route=adminCertifications');
                exit;
            }
        }

        $slideCertificationManager = new SlideCertificationManager();
        $certifications = $slideCertificationManager->findAllCertifications();

        return $this->twig->render('Admin/adminCertifications.html.twig', [
            'certifications' => $certifications,
            'uploadErrors' => $uploadErrors,
        ]);
    }

    /**
     * @return string
     */
    public function showAdminSliderAction()
    {
        $slide = new SlideCertification();
        $uploadErrors = [];

        if (!empty($_POST)) {
            $slide->setRole('SLIDE');

            $uploadImageManager = new UploadImageManager();
            $uploadErrors = $uploadImageManager->imageUpload($_FILES);

            if (empty($uploadErrors)) {
                $slide->setName($uploadImageManager->getImageName());

                $slideCertificationManager = new SlideCertificationManager();
                $slideCertificationManager->insert($slide);

                header('Location: index.php?route=adminSlider');
                exit;
            }
        }

        $slideCertificationManager = new SlideCertificationManager();
        $slides = $slideCertificationManager->findAllSlides();

        return $this->twig->render('Admin/adminSlider.html.twig', [
            'slides' => $slides,
            'uploadErrors' => $uploadErrors,
        ]);
    }

    public function deleteSlideAction()
    {
        if (!empty($_POST['id'])) {
            $slideCertificationManager = new SlideCertificationManager();
            $slide = $slideCertificationManager->find($_POST['id']);
            if (file_exists('assets/uploads/' . $slide->getName())) {
                $slideCertificationManager->delete($slide);
                unlink('assets/uploads/' . $slide->getName());
            }
            header('Location: index.php?route=adminSlider');
        }
    }

    public function deleteCertificationAction()
    {
        if (!empty($_POST['id'])) {
            $slideCertificationManager = new SlideCertificationManager();
            $certification = $slideCertificationManager->find($_POST['id']);
            if (file_exists('assets/uploads/' . $certification->getName())) {
                $slideCertificationManager->delete($certification);
                unlink('assets/uploads/' . $certification->getName());
            }
            header('Location: index.php?route=adminCertifications');
        }
    }
}
