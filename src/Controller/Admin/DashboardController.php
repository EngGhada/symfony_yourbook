<?php

namespace App\Controller\Admin;

use App\Entity\Genre;
use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Stock;
use App\Entity\Usure;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
       // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // 1.1) If you have enabled the "pretty URLs" feature:
        // return $this->redirectToRoute('admin_user_index');
        //
        // 1.2) Same example but using the "ugly URLs" that were used in previous EasyAdmin versions:
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');


        return $this->render('admin/dashboard.html.twig'); // i have created this template
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Yourbook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
       // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
       yield MenuItem::linkToCrud('Genre', 'fas fa-tags', Genre::class); // i have created this line and importe " use App\Entity\Genre;"
       yield MenuItem::linkToCrud('Editeur', 'fas fa-list', Editeur::class);
       yield MenuItem::linkToCrud('Auteur', 'fas fa-list', Auteur::class);
       yield MenuItem::linkToCrud('Livre', 'fas fa-book', Livre::class);
       yield MenuItem::linkToCrud('Stock', 'fas fa-list', Stock::class); // i have created this line and importe " use App\Entity\Livre;"
       yield MenuItem::linkToCrud('Usure', 'fas fa-list', Usure::class);
          


    }
}
