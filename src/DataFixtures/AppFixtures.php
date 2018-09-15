<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        //create a user
        $user = new User();
        $user->setEnabled(true);
        $user->setUsername('user');
        $user->setEmail('user@test.com');
        $user->setRoles(['ROLE_USER']);
        $password = $this->encoder->encodePassword($user, 'user');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();

        //create a user 2
        $user = new User();
        $user->setUsername('demo');
        $user->setEnabled(true);
        $user->setEmail('demo@test.com');
        $user->setRoles(['ROLE_USER']);
        $password = $this->encoder->encodePassword($user, 'demo');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();


        // create a admin
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setRoles(array('ROLE_ADMIN'));
        $admin->setEmail('admin@test.com');
        $admin->setEnabled(true);
        $admin->setSuperAdmin(true);
        $password = $this->encoder->encodePassword($user, 'admin');
        $admin->setPassword($password);

        $manager->persist($admin);
        $manager->flush();
    }
}
