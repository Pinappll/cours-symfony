<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Episode;
use App\Entity\User;
use App\Enum\UserAccountStatusEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Comment;

class AppFixtures extends Fixture
{
    public const MAX_USERS = 10;

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

    protected function createUsers(ObjectManager $manager, array &$users): void
    {
        for ($i = 0; $i < self::MAX_USERS; $i++) {
            $user = new User();
            $user->setEmail(email: "test_{$i}@example.com");
            $user->setUsername(username: "test_{$i}");
            $user->setPassword(password: 'test');
            $user->setAccountStatus(UserAccountStatusEnum::ACTIVE);
            $users[] = $user;

            $manager->persist(object: $user);
        }

        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setUsername('Joshua');
        $admin->setPassword('motdepasse');
        $admin->addRole('ROLE_ADMIN');
        $admin->setAccountStatus(UserAccountStatusEnum::ACTIVE);
        $manager->persist($admin);

        $normal = new User();
        $normal->setEmail('normal@example.com');
        $normal->setUsername('John');
        $normal->setPassword('motdepasse');
        $normal->addRole('ROLE_BANNED');
        $normal->setAccountStatus(UserAccountStatusEnum::ACTIVE);
        $manager->persist($normal);
    }
}
