<?php

namespace pithyone\zhihu\crawler\Extractors\Answer;

use pithyone\zhihu\crawler\Extractors\Extractor;

class Answers implements Extractor
{
    static public function extract($crawler)
    {
        return $crawler->filter('div[tabindex="-1"]')->each(function ($node) {
            return [
                'author'      => Author::extract($node),
                'author_link' => AuthorLink::extract($node),
                'bio'         => Bio::extract($node),
                'vote_count'  => $node->filter('div[class="zm-item-vote-info"]')->attr('data-votecount'),
                'images'      => Images::extract($node),
            ];
        });
    }
}