<?php

namespace App\Controller\Admin;

use App\Entity\Livre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LivreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
      yield from parent::configureFields($pageName); // Call the parent method to get the default fields , if i didn't this line i will not see the fields in the form just the fields that i have mentioned below
      yield AssociationField::new('auteur');
      yield AssociationField::new('editeur');
      yield AssociationField::new('genres'); // genres is property in the entity Livrewhich is collection of Genre and of relation manytomany
    }
    
}
