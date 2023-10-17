<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('content'),
            ImageField::new('image')->setUploadDir("public/img/article")
                                    ->setBasePath("/img/article")
                                    ->setRequired(false),
            // Ceci crée un champ d'image pour télécharger une image associée à l'article. Les méthodes setUploadDir, setBasePath et setRequired sont utilisées pour définir respectivement le répertoire de téléchargement, le chemin de base pour l'image et spécifier si le champ est facultatif (dans ce cas, il est défini sur false).
                                
            AssociationField::new('auteur'),
            // sélectionner ou afficher l'auteur de l'article. Il est probablement lié à une autre entité représentant l'auteur.
            AssociationField::new('category'),

            
        ];

        /*
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('content'),
            ImageField::new('image')->setUploadDir("public/images/articles")
                                    ->setBasePath("/images/articles")
                                    ->setRequired(false),
            AssociationField::new('auteur'),
            AssociationField::new('category'),
        ];
        */
    }
    
}
