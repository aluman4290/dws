<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const USUARIO_ADMIN_REFERENCIA = 'user-admin';
    public const USUARIO_USER_REFERENCIA = 'user-user';
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->userPasswordEncoder = $userPasswordEncoderInterface;
    }
    public function load(ObjectManager $manager): void
    {
        $usuario = new User();
        $usuario->setEmail('admin@admin.com');
        $usuario->setPassword($this->userPasswordEncoder->encodePassword($usuario, 'admin'));
        $usuario->setRoles(['ROLE_ADMIN']);
        $manager->persist($usuario);
        $manager->flush();
        $this->addReference(self::USUARIO_ADMIN_REFERENCIA, $usuario);

        $usuario = new User();
        $usuario->setEmail('user@user.com');
        $usuario->setPassword($this->userPasswordEncoder->encodePassword($usuario, 'admin'));
        $usuario->setRoles(['ROLE_USER']);
        $manager->persist($usuario);
        $manager->flush();
        $this->addReference(self::USUARIO_USER_REFERENCIA, $usuario);
    }
}
