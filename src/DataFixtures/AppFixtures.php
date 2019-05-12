<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoder
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) 
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $this-> loadUsers($manager);
    }

    private function loadUsers(ObjectManager $manager) {

        $user = new User();

        $user->setUsername('elodiemartin');

        $user->setPassword($this->encoder->encodePassword($user, 'testtest'));

        $user->setEmail('contact@elodie-martin.com');

        $manager->persist($user);

        $manager->flush();
    }
}
