<?php

namespace AppBundle\Fixtures;

use AppBundle\Entity\MyUser;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Valouleloup\IssueBundle\Entity\Issue;
use Valouleloup\IssueBundle\Entity\Post;
use Valouleloup\IssueBundle\Entity\Tag;
use Valouleloup\IssueBundle\Entity\Theme;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Users
        $user1 = new MyUser();
        $user1->setEmail('toto@gmail.com');
        $user1->setFirstName('toto');
        $user1->setLastName('toto');
        $user1->setPassword('$2y$13$S4OvTZOwgOFCG/uKiA99CeN9Zx165idsqFqyAxvVeaz3hEuw4G.e6');
        $manager->persist($user1);

        // Themes
        $theme1 = new Theme();
        $theme1->setLabel('Back');
        $manager->persist($theme1);

        $theme2 = new Theme();
        $theme2->setLabel('Front');
        $manager->persist($theme2);

        $theme3 = new Theme();
        $theme3->setLabel('SI');
        $manager->persist($theme3);

        // Tags
        $tag1 = new Tag();
        $tag1->setLabel('Doctrine');
        $tag1->setColor('e4ae4a');
        $manager->persist($tag1);

        $tag2 = new Tag();
        $tag2->setLabel('Api Platform');
        $tag2->setColor('abdabd');
        $manager->persist($tag2);

        $tag3 = new Tag();
        $tag3->setLabel('Symfony');
        $tag3->setColor('c76a6a');
        $manager->persist($tag3);

        $tag4 = new Tag();
        $tag4->setLabel('Composer');
        $tag4->setColor('48b8da');
        $manager->persist($tag4);

        // Issues
        $issue1 = new Issue();
        $issue1->setLabel('My issue problem');
        $issue1->setBody('jn rjnjfnrlifbnlrbfrb bf');
        $issue1->setTags($tag1);
        $issue1->setTags($tag2);
        $issue1->setTheme($theme1);
        $issue1->setAuthor($user1);
        $issue1->setUpdatedAt(new DateTime('01-01-2018 12:00:00'));
        $manager->persist($issue1);

        $issue2 = new Issue();
        $issue2->setLabel('My other issue problem');
        $issue2->setBody('jn rjnjfnrlifbnlrbfrb bf <br> ```toto blabla``` <br> beirtbb erbt ierbt eirbteirt ierbtiebrt');
        $issue2->setTags($tag1);
        $issue2->setTags($tag3);
        $issue2->setTheme($theme2);
        $issue2->setAuthor($user1);
        $issue2->setUpdatedAt(new DateTime('01-01-2018 13:00:00'));
        $manager->persist($issue2);

        $issue3 = new Issue();
        $issue3->setLabel('My other doctrine issue');
        $issue3->setBody('jn rjnjfnrlifbnlrbfrb bf <br> ```toto blabla``` <br> beirtbb erbt ierbt eirbteirt ierbtiebrt');
        $issue3->setTags($tag1);
        $issue3->setTheme($theme2);
        $issue3->setAuthor($user1);
        $issue3->setUpdatedAt(new DateTime('01-01-2018 14:00:00'));
        $manager->persist($issue3);

        $issue4 = new Issue();
        $issue4->setLabel('My other symfony issue blabma');
        $issue4->setBody('jn rjnjfnrlifbnlrbfrb bf');
        $issue4->setTags($tag3);
        $issue4->setTheme($theme2);
        $issue4->setAuthor($user1);
        $issue4->setUpdatedAt(new DateTime('01-01-2018 15:00:00'));
        $manager->persist($issue4);

        $issue5 = new Issue();
        $issue5->setLabel('My other toto issue blabma');
        $issue5->setBody('jn rjnjfnrlifbnlrbfrb bf');
        $issue5->setTags($tag2);
        $issue5->setTags($tag3);
        $issue5->setTheme($theme2);
        $issue5->setAuthor($user1);
        $issue5->setUpdatedAt(new DateTime('01-01-2018 16:00:00'));
        $manager->persist($issue5);

        $issue6 = new Issue();
        $issue6->setLabel('My other api issue');
        $issue6->setBody('jn rjnjfnrlifbnlrbfrb bf');
        $issue6->setTags($tag1);
        $issue6->setTags($tag3);
        $issue6->setTheme($theme2);
        $issue6->setAuthor($user1);
        $issue6->setUpdatedAt(new DateTime('01-01-2018 17:00:00'));
        $manager->persist($issue6);

        $issue7 = new Issue();
        $issue7->setLabel('My other sonata issue blabla');
        $issue7->setBody('jn rjnjfnrlifbnlrbfrb bf');
        $issue7->setTags($tag1);
        $issue7->setTags($tag2);
        $issue7->setTheme($theme2);
        $issue7->setAuthor($user1);
        $issue7->setUpdatedAt(new DateTime('01-01-2018 18:00:00'));
        $manager->persist($issue7);

        $issue8 = new Issue();
        $issue8->setLabel('My other composer issue blabla');
        $issue8->setBody('jn rjnjfnrlifbnlrbfrb bf');
        $issue8->setTags($tag4);
        $issue8->setTheme($theme2);
        $issue8->setAuthor($user1);
        $issue8->setUpdatedAt(new DateTime('01-01-2018 19:00:00'));
        $manager->persist($issue8);

        // Posts
        for ($i = 0; $i < 4; $i++) {
            $post = new Post();
            $post->setBody('## blabla
blo blo
> blublu

``` 
rkjgberjgbkle bgk ergbe 
kjz ejbiz ze fijbzef
kmezbfm zbfozb fofezuobf ozbfou
```');
            $post->setAuthor($user1);
            $post->setIssue($issue1);
            $manager->persist($post);
        }

        for ($i = 0; $i < 6; $i++) {
            $post = new Post();
            $post->setBody('## blabla
blo blo
> blublu

``` 
rkjgberjgbkle bgk ergbe 
kjz ejbiz ze fijbzef
kmezbfm zbfozb fofezuobf ozbfou
```');
            $post->setAuthor($user1);
            $post->setIssue($issue2);
            $manager->persist($post);
        }

        $manager->flush();
    }
}