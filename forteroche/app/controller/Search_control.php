<?php 

class Search_control {

    public function find($search)
    {
        $myBdd = new Search_bdd;
        $chapters_results = $myBdd->find_chapters($search);
        $books_results = $myBdd->find_books($search);
        $genre_results = $myBdd->find_genre($search);
            
        $count = $chapters_results->rowcount();
        $row = $books_results->rowcount();
        $rowcount = $genre_results->rowcount();

        if($count) 
        {
            while ($result = $chapters_results->fetch()) 
            {
                echo 'Chapitre : '.$result['title'].'<br>';
            }
        }

        if($row) 
        {
            while ($results = $books_results->fetch()) 
            {
                echo 'Livre : '.$results['book'].'<br>';
            }
        }

        if($rowcount) 
        {
            while ($resultat = $genre_results->fetch()) 
            {
                echo 'Genre : '.$resultat['genre'].'<br>';
            }
        }

    }

}