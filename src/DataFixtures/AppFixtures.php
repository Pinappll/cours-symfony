<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Comment;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorie1 = new Categorie();
        $categorie1->setName('Action');
        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setName('Aventure');
        $manager->persist($categorie2);

        // Comments
        $comment1 = new Comment('This is a comment');
        $comment1->setStatus('published');
        $comment1->setPublisher($this->getReference('user1'));
        $comment1->setMedia($this->getReference('media1'));
        $manager->persist($comment1);

        $comment2 = new Comment('This is another comment');
        $comment2->setStatus('published');
        $comment2->setPublisher($this->getReference('user2'));
        $comment2->setMedia($this->getReference('media2'));
        $manager->persist($comment2);

        // Episodes
        for ($i = 1; $i <= 10; $i++) {
            $episode = new Episode();
            $episode->setTitle('Episode ' . $i);
            $episode->setSeason($this->getReference('season1'));
            $manager->persist($episode);
        }



        $manager->flush();
    }
}
