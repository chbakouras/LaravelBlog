<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Helpers;


use App\Models\Post;
use App\Repositories\System\OptionRepository;

class BlogHelper
{
    private $optionRepository;

    /**
     * BlogHelper constructor.
     * @param OptionRepository $optionRepository
     */
    public function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    public function isPage(Post $post)
    {
        return $post->type === 'page';
    }

    public function isPost(Post $post)
    {
        return $post->type === 'post';
    }

    public function isFrontPage(Post $post)
    {
        $frontPageId = $this->optionRepository->findOptionIntegerValueByName('front-page-id');

        return $post->id == $frontPageId;
    }

    public function isFrontPageId($id)
    {
        $frontPageId = $this->optionRepository->findOptionIntegerValueByName('front-page-id');

        return $id == $frontPageId;
    }
}