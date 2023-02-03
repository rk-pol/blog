<?php


namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /**
     * @param $id
     * @param array $options
     * @return mixed
     */
    public static function recent_posts($id, $options = []): Collection
    {
        if (empty($options)) {
            $options = [
                'orderByField' => 'created_at',
                'orderOpt' => 'desc',
                'limit' => '3'
            ];
        }

        return Post::select('*')
                        ->where('id', '<>',  $id)
                        ->orderBy($options['orderByField'], $options['orderOpt'])
                        ->take($options['limit'])
                        ->get();
    }
}
