<?php

namespace App\Controller;

use GuzzleHttp\Client;
use App\Entity\Movie;
use App\Entity\Media;
use App\Entity\MovieInfo;
use App\Entity\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function newMovie(Request $request)
    {
        $client = new Client();

        $res = $client->request('GET','https://api-content.ingresso.com/v0/events/');

        $arrayContent = json_decode($res->getBody());

        foreach ($arrayContent as $value)
        {   
            $entityManager = $this->getDoctrine()->getManager();

            /*Movie*/
            //$id = PRIMARY KEY;
            $movie_velox_id = 'NULL';
            $movie_ingresso_id = $value->id;
            $movie_imdb_id = 'NULL';
            $movie_status = $value->isPlaying;

            /*MovieInfo*/
            //id = PRIMARY KEY;
            //movie_info_id = FOREIGN KEY REFERENCES movie(id)
            $movie_info_name = $value->title;
            $movie_info_duration = $value->duration;
            $movie_info_description = $value->synopsis;
            $movie_info_genre_0 = $value->genres[0];

            if($value->genres[1])
            {
                $movie_info_genre_1 = $value->genres[1];
                $movie_info_category = $movie_info_genre_0.', '.$movie_info_genre_1;
            } 
            else 
            {
                $movie_info_category = $movie_info_genre_0;
            }

            $movie_info_actor = $value->cast;
            $movie_info_director = $value->director;
            $movie_info_recommended_age = $value->contentRating;
            $movie_info_rating = $value->rating;
            $movie_info_status = 1;
            $movie_info_launch_date = $value->creationDate;
            $movie_info_created_at = new \DateTime('now');
            $movie_info_updated_at = new \DateTime('now');

            /*Media*/
            //id = PRIMARY KEY;
            //$movie_id = FOREIGN KEY REFERENCES movie(id)
            if($value->trailers){
                $medias = array(
                    array($url = $value->images[0]->url, $value->images[0]->type),
                    array($url = $value->images[1]->url, $value->images[1]->type),
                    array($url = $value->trailers[0]->url, $value->trailers[0]->type),
                    array($url = $value->trailers[1]->url, $value->trailers[1]->type),
                );
            }
            else{
                $medias = array(
                    array($url = $value->images[0]->url, $value->images[0]->type),
                    array($url = $value->images[1]->url, $value->images[1]->type),
                );
            }
           
            $movie = new Movie();
            $movie->setVeloxId($movie_velox_id);
            $movie->setIngressoId($movie_ingresso_id);
            $movie->setImdbId($movie_imdb_id);
            $movie->setStatus($movie_status);
            $entityManager->persist($movie);

            $movie_info = new MovieInfo();
            $movie_info->setMovie($movie);
            $movie_info->setName($movie_info_name);
            $movie_info->setDuration($movie_info_duration);
            $movie_info->setDescription($movie_info_description);
            $movie_info->setCategory($movie_info_category);
            $movie_info->setActor($movie_info_actor);
            $movie_info->setDirector($movie_info_director);
            $movie_info->setRecommendedAge($movie_info_recommended_age);
            $movie_info->setRating($movie_info_rating);
            $movie_info->setStatus($movie_info_status);
            $movie_info->setLaunchDate($movie_info_launch_date);
            $movie_info->setCreatedAt($movie_info_created_at);
            $movie_info->setUpdatedAt($movie_info_updated_at);
            $entityManager->persist($movie_info);

            foreach($medias as $media)
            {
                $media = new Media();
                $media->setMovie($movie);
                $media->setUrl($media[$url]);
                $media->setType($media[$type]);
                $entityManager->persist($media);

                $entityManager->flush();
            }
            $entityManager->flush();
        }
    }
}
