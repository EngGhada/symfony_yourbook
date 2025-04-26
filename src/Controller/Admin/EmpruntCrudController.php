<?php

namespace App\Controller\Admin;

use App\Entity\Emprunt;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use Doctrine\ORM\EntityManagerInterface;

class EmpruntCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emprunt::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield from parent::configureFields($pageName); 
         yield DateTimeField::new('date_previsionnelle')->setDisabled(true);
       // yield DateTimeField::new('date_previsionnelle')->hideOnIndex()->setDisabled(true);
        yield AssociationField::new('exemplaire');
        yield AssociationField::new('adherent');   
    }

    
    // public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    // {
    //     if (!$entityInstance instanceof Emprunt) return;
    
    //     $entityInstance->setDatePrevisionnelleAutomatically();
    
    //     parent::persistEntity($entityManager, $entityInstance);
    // }

    //     public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    // {
    //     if (!$entityInstance instanceof Emprunt) return;

    //     $entityInstance->setDatePrevisionnelleAutomatically();

    //     parent::updateEntity($entityManager, $entityInstance);
    // }
        

}
