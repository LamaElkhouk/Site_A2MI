<?php

namespace App\Controller\Admin;

use App\Entity\OngletsHeader;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OngletsHeaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OngletsHeader::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
