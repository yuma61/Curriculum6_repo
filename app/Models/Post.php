<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Laravel Model Factories
    // It is a feature that simplifies the creation of fake or test data for the model. 
    // Factories are primarily used in testing or seedin the database with dummy data.
    
    // HasFactory
    // functionality to link the Post model to its corresponding factory class in database/factories

    public function getByLimit(int $limit_count = 3) {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();

        // orderBy() sorts the records in the table by the updated_at column in descending order.
        // limit() Limites the number of recoreds retrieved to the specified counts
        // get() executes the query and retireves the records as a collection of Eloquent model instances.
    }

    public function getPaginateByLimit(int $limit_count = 3) {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);

        // $this (same as python)
        // It  refers to the instance of the Eloquent model class where function is defined.
        // $this represents the Post model

        // paginate()
        // It divides the query results into pages.
        // fetch maximum of count records per page.
    }

    //この上の2つのmethod、postじゃなくて、posts用
}


?>