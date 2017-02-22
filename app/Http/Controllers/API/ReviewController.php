<?php

namespace App\Http\Controllers\API;

use App\Review;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class ReviewController extends Controller
{
    public function create()
    {
        $user_id = 1;

        Review::create([
            'user_id' => $user_id,
            'picture_url' => 'JPEG_20170216_093500_-1148894724.jpg',
            'review_text' => 'Testing reviews 2!'
        ]);

        return ['success' => true];
    }

    public function show(Request $request)
    {
        $headerAuth = $request->header('Authorization');
        $data = '';
        if (!is_null($headerAuth)) {
            $user_id = JWTAuth::parseToken()->authenticate()->id;
            if (is_numeric($user_id) && !is_null($user_id)) {
                $data = Review::where('user_id', $user_id)->where('review', 'waiting')->get();
            }
        } else {
            $data = auth()->user()->reviews()->where('review', 'waiting')->get();
        }

        if(count($data)) {
            return $data;

        }
        return ['success' => true, 'status' => 'none'];
    }

    private function isAdmin(User $collection)
    {
        $admin = $collection->roles()->get()->contains(function ($key, $value) {
            return $value['level'] >= 1337;
        });
        if ($admin && is_numeric($admin)) {
            return true;
        }
        return false;
    }
}
