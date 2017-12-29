<?php

namespace AppBundle\Fixtures;

use AppBundle\Entity\MyUser;
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
        $user1->setPassword('111');
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

        // Issues
        $issue1 = new Issue();
        $issue1->setLabel('My issue problem');
        $issue1->setBody('jn rjnjfnrlifbnlrbfrb bf');
        $issue1->setTags($tag1);
        $issue1->setTags($tag2);
        $issue1->setTheme($theme1);
        $issue1->setAuthor($user1);
        $manager->persist($issue1);

        $issue2 = new Issue();
        $issue2->setLabel('My other issue problem');
        $issue2->setBody('jn rjnjfnrlifbnlrbfrb bf <br> ```toto blabla``` <br> beirtbb erbt ierbt eirbteirt ierbtiebrt');
        $issue2->setTags($tag1);
        $issue2->setTags($tag3);
        $issue2->setTheme($theme2);
        $issue2->setAuthor($user1);
        $manager->persist($issue2);

        // Posts
        for ($i = 0; $i < 5; $i++) {
            $post = new Post();
            $post->setBody('<h2>My title</h2> bggb righbe iebgihebgihbe <br> ` yolooooo yolo `');
            $post->setAuthor($user1);
            $post->setIssue($issue1);
            $manager->persist($post);
        }

        for ($i = 0; $i < 5; $i++) {
            $post = new Post();
            $post->setBody('<h2>My title</h2> rjrfrh <br> bggb righbe iebgihebgihbe <br> ` yolooooo yolo `');
            $post->setAuthor($user1);
            $post->setIssue($issue2);
            $manager->persist($post);
        }

        $manager->flush();
    }
}