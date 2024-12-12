<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];

    use HasFactory;
    use SoftDeletes;
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
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        // return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);

        // ここの：：Withの必要性


        // :: is used because it interacts with the class itself rather than an instance of the class

        // with('category')
        // loads the category relationship for the Post model
        // Ensures that for each post retrieved, the associated category data is fetched from the categories table in a single query improving performance

        // $this (same as python)
        // It  refers to the instance of the Eloquent model class where function is defined.
        // $this represents the Post model

        // paginate()
        // It divides the query results into pages.
        // fetch maximum of count records per page.
    }

    //この上の2つのmethod、postじゃなくて、posts用


    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}


?>