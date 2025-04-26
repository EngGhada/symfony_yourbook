<?php

namespace App\Controller\Admin;

use App\Entity\Exemplaire;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExemplaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Exemplaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       yield from parent::configureFields($pageName); // Call the parent method to get the default fields , if i didn't this line i will not see the fields in the form just the fields that i have mentioned below
       yield AssociationField::new('livre'); 
       yield AssociationField::new('usure');
       yield AssociationField::new('stock');
       //
    }
    
}
