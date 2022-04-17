<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Coffee;
class CoffeeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $coffee2 = new coffee();
        $coffee2->setName('Espresso');
        $coffee2->setDescription('An espresso shot, which forms the basis of many of the other drinks to follow, is produced by forcing hot water through finely ground coffee beans');
        $coffee2->setPrice(5.00);
        $coffee2->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee2);

        $coffee1 = new coffee();
        $coffee1->setName('Doppio');
        $coffee1->setDescription('A Doppio is a double shot of espresso with no added hot water or milk. This results in 60 ml of coffee. Doppio means double in Italian.');
        $coffee1->setPrice(7.00);
        $coffee1->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee1);

        $coffee3 = new coffee();
        $coffee3->setName('Ristretto');
        $coffee3->setDescription('A ristretto, which means restricted in Italian, is a shot of espresso coffee but extracted with half the amount of water. This results in a delicious, concentrated shot.');
        $coffee3->setPrice(4.00);
        $coffee3->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee3);

        $coffee4 = new coffee();
        $coffee4->setName('Long Black');
        $coffee4->setDescription(' A long black is made by pouring a double-shot of espresso over hot water. Unlike an Americano which is made by adding hot water to the espresso shot, a long black retains the crema and is less voluminous, therefore more strongly flavoured.');
        $coffee4->setPrice(5.50);
        $coffee4->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee4);

        $coffee5 = new coffee();
        $coffee5->setName('Short Macchiato');
        $coffee5->setDescription(' A short macchiato is served in a small glass consisting of a single espresso shot then filled with creamy steamed milk and finished with a small layer of foam.');
        $coffee5->setPrice(4.00);
        $coffee5->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee5);

        $coffee6 = new coffee();
        $coffee6->setName('Long Macchiato');
        $coffee6->setDescription(' A long macchiato is similar to a short macchiato, except that it contains a double shot (around 60ml) of coffee.');
        $coffee6->setPrice(7.00);
        $coffee6->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee6);

        $coffee7 = new coffee();
        $coffee7->setName('Mezzo Mezzo (Piccolo)');
        $coffee7->setDescription('A mezzo mezzo (also known as a piccolo) is a single espresso shot in a small latte glass, which is then filled with steamed milk.');
        $coffee7->setPrice(7.00);
        $coffee7->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee7);

        $coffee8 = new coffee();
        $coffee8->setName('Latte');
        $coffee8->setDescription('A latte is a coffee espresso shot filled with steamed milk and with a layer of foamed milk crema.');
        $coffee8->setPrice(4.50);
        $coffee8->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee8);


        $coffee9 = new coffee();
        $coffee9->setName('Flat White');
        $coffee9->setDescription('A flat white is very similar to a latte, with un-textured milk (no air incorporated when being steamed) resulting in espresso and steamed milk with little or no froth.');
        $coffee9->setPrice(3.50);
        $coffee9->setImage('https://cdn.pixabay.com/photo/2015/09/09/17/42/coffee-932103_1280.jpg');
        $manager->persist($coffee9);

        $manager->flush();
    }
}
