<?php

namespace Mw\Bundle\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;
/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mw\Bundle\RestBundle\Entity\ArticleRepository")
 *
 * @Hateoas\Relation("self", href = "expr('/article/' ~ object.getId())")
 * @Hateoas\Relation("comments", href = "expr('/article/' ~ object.getId() ~ '/comments') ")
 * @Hateoas\Relation(
 *     "comments",
 *     embedded = "expr(object.getComments())"
 * )
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="article")
     * @Serializer\Exclude()
     */
    protected $comments;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comment
     *
     * @param \Mw\Bundle\RestBundle\Entity\Comment $comment
     *
     * @return Article
     */
    public function addComment(\Mw\Bundle\RestBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Mw\Bundle\RestBundle\Entity\Comment $comment
     */
    public function removeComment(\Mw\Bundle\RestBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
