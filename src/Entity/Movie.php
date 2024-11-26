<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'mediaType', type: 'string')]
#[ORM\DiscriminatorMap(['movie' => 'Movie'])]
class Movie extends Media
{

}
